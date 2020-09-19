<?php

$data = null;
include_once("../core/init.php");

if(!isset($data['nums'])) {
    wsRetorno(400, "Valores passados incorretamente pelos parâmetros!");
}

$counts = array();
$data['nums'] = explode(";", $data['nums']);
foreach ($data['nums'] AS $num) {
    $num = trim($num);
    if(filter_var($num, FILTER_VALIDATE_FLOAT) === false) {
        if(!empty($num)) {
            wsRetorno(400, "Valores passados incorretamente pelos parâmetros!");
        }
        continue;
    }

    if(!isset($counts[(string) $num])) {
        $counts[(string) $num] = 0;
    }
    $counts[(string) $num] += 1;
}

$ret = array();
$max = 0;
foreach ($counts AS $count) {
    $max = max($max, $count);
}
foreach ($counts AS $num => $count) {
    if($count == $max) {
        $ret[] = $num;
    }
}

wsRetorno(200, "Sucesso!", $ret);