<?php

require './vendor/autoload.php';

//Redis Init
try {
    $redis = new \Predis\Client([
        "scheme" => "tcp",
        "host" => '159.65.100.84',
        "port" => 6379
    ]);
}
catch (Exception $e) {
    die($e->getMessage());
}


//Workload
$logData = [
    'time' => microtime(true),
    'request' => print_r($_REQUEST)
];

$redis->set(md5($logData . rand(10000)), $logData);
