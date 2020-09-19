<?php

$data = null;
include_once("../core/init.php");

if(
    !isset($data['num']) ||
    filter_var($data['num'], FILTER_VALIDATE_FLOAT) === false
) {
    wsRetorno(400, "Valores passados incorretamente pelos parâmetros!");
}
$ret = sqrt($data['num']);

wsRetorno(200, "Sucesso!", $ret);