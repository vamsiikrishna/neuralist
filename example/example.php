<?php
require_once __DIR__.'/../vendor/autoload.php';

$redis = new Predis\Client(array(
    'host' => '127.0.0.1',
    'port' => 9999,
));

$nn = new \Vamsi\Neuralist\NeuralNetwork(
    'additions',
    'regressor',
    [2,3],
    'result',
    '3',
    50,
    12,
    true,true,true,
    $redis

);

$nn = $nn->create();
xdebug_var_dump($nn);