<?php

$data = null;
include_once("../core/init.php");

if(
    !isset($data['base']) ||
    filter_var($data['base'], FILTER_VALIDATE_FLOAT) === false ||
    !isset($data['exp']) ||
    filter_var($data['exp'], FILTER_VALIDATE_FLOAT) === false
) {
    wsRetorno(400, "Valores passados incorretamente pelos parâmetros!");
}
$ret = pow($data['base'], $data['exp']);

wsRetorno(200, "Sucesso!", $ret);