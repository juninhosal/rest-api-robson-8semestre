<?php

$data = null;
include_once("../core/init.php");

if(
    !isset($data['num1']) ||
    filter_var($data['num1'], FILTER_VALIDATE_FLOAT) === false ||
    !isset($data['num2']) ||
    filter_var($data['num2'], FILTER_VALIDATE_FLOAT) === false
) {
    wsRetorno(400, "Valores passados incorretamente pelos parâmetros!");
}
$ret = $data['num1'] + $data['num2'];

wsRetorno(200, "Sucesso!", $ret);