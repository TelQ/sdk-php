<?php
require 'vendor/autoload.php';
use TelQ\Sdk\Api;
use TelQ\Sdk\Http\HttpException;
use TelQ\Sdk\Models\Destination;
use TelQ\Sdk\Models\Tests;

$appId = 0;
$appKey = '';

$api = new Api($appId, $appKey);
try {
    $sendTests = Tests::fromArray([
        'destinationNetworks' => [
            new Destination('222', '36', '10'),
            new Destination('505', '01')
        ]
    ]);
    $tests = $api->sendManualTests($sendTests);
} catch (HttpException $exception) {
    echo 'Handle http exception', PHP_EOL;
    echo 'Response code ', $exception->getResponse()->getStatus(), PHP_EOL;
    echo 'Response body ', $exception->getResponse()->getBody(), PHP_EOL;
}
?>
