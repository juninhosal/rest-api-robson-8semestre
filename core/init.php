<?php

error_reporting(0);
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

function isJson($string) {
    json_decode($string);
    return (json_last_error() == JSON_ERROR_NONE);
}

function wsRetorno($code, $msg = null, $dado = null) {
    $codes = array(
        400 => array(
            'msg' => "Request mal informada!",
            'ret' => null,
        ),
        200 => array(
            'msg' => "Sucesso ao realizar operação!",
            'ret' => null,
        ),
    );

    $ret = $codes[$code];
    $ret['msg'] = $msg;
    $ret['ret'] = $dado;
    http_response_code($code);
    echo json_encode($ret, true);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] !== "GET") {
    wsRetorno(400, "Requisição mal informada!");
}

$data = $_GET;
if(empty($data)) {
    wsRetorno(400, "Parâmetros GET não informados!");
}