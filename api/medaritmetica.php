<?php

$data = null;
include_once("../core/init.php");

if(!isset($data['nums'])) {
    wsRetorno(400, "Valores passados incorretamente pelos parâmetros!");
}

$ret = 0;
$data['nums'] = explode(";", $data['nums']);
foreach ($data['nums'] AS $num) {
    $num = trim($num);
    if(filter_var($num, FILTER_VALIDATE_FLOAT) === false) {
        if(!empty($num)) {
            wsRetorno(400, "Valores passados incorretamente pelos parâmetros!");
        }
        continue;
    }

    $ret += ($num * 1);
}
$ret = $ret / count($data['nums']);

wsRetorno(200, "Sucesso!", $ret);