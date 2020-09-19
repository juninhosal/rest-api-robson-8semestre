<?php

$data = null;
include_once("../core/init.php");

if(!isset($data['nums']) || !isset($data['pesos'])) {
    wsRetorno(400, "Valores passados incorretamente pelos parâmetros!");
}

$paramsNums = 0;
$paramsPesos = 0;
$newArr = array();
$data['nums'] = explode(";", $data['nums']);
$data['pesos'] = explode(";", $data['pesos']);
foreach ($data['nums'] AS $num) {
    $num = trim($num);
    if(filter_var($num, FILTER_VALIDATE_FLOAT) === false) {
        if(!empty($num)) {
            wsRetorno(400, "Valores passados incorretamente pelos parâmetros!");
        }
        continue;
    }

    $newArr[] = array(
        'num' => ($num * 1),
        'peso' => 0,
    );
    $paramsNums += 1;
}
foreach ($data['pesos'] AS $num) {
    $num = trim($num);
    if(filter_var($num, FILTER_VALIDATE_FLOAT) === false) {
        if(!empty($num)) {
            wsRetorno(400, "Valores passados incorretamente pelos parâmetros!");
        }
        continue;
    }

    $newArr[$paramsPesos]['peso'] = ($num * 1);
    $paramsPesos += 1;
}
if($paramsNums != $paramsPesos) {
    wsRetorno(400, "A quantidade de parâmetros de números e pesos não batem!");
}

$ret = 0;
$divisao = 0;
foreach ($newArr AS $val) {
    $ret += $val['num'] * $val['peso'];
    $divisao += $val['peso'];
}
if(empty($divisao)) {
    wsRetorno(400, "A soma dos pesos é igual a 0, impossível dividir por 0!");
}
$ret /= $divisao;

wsRetorno(200, "Sucesso!", $ret);