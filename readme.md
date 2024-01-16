[![Phpunit](https://github.com/TelQ/sdk-php/actions/workflows/tests.yml/badge.svg)](https://github.com/TelQ/sdk-php/actions/workflows/tests.yml)
[![Latest Stable Version](http://poser.pugx.org/telq/sdk/v)](https://packagist.org/packages/telq/sdk) 
[![PHP Version Require](http://poser.pugx.org/telq/sdk/require/php)](https://packagist.org/packages/telq/sdk)

# Install
```shell
composer require telq/sdk
````
# Usage
```php
use TelQ\Sdk\Api;
use TelQ\Sdk\Http\HttpException;

$appId = 123;
$appKey = 'my-key';

$api = new Api($appId, $appKey);
try {
    // call api
} catch (HttpException $exception) {
    echo 'Handle http exception', PHP_EOL;
    echo 'Response code ', $exception->getResponse()->getStatus(), PHP_EOL;
    echo 'Response body ', $exception->getResponse()->getBody(), PHP_EOL;
}
````
## Networks
```php
$networks = $api->getNetworks();
foreach ($networks as $network) {
    echo 'Mcc: ', $network->getMcc(), PHP_EOL;
    echo 'Country name: ', $network->getCountryName(), PHP_EOL;
    echo 'Mnc: ', $network->getMnc(), PHP_EOL;
    echo 'Provider name: ', $network->getProviderName(), PHP_EOL;
    echo 'Ported from mnc: ', $network->getPortedFromMnc() ?: 'empty', PHP_EOL;
    echo 'Ported from provider name: ', $network->getPortedFromProviderName() ?: 'empty', PHP_EOL;
    echo PHP_EOL;
}
echo 'Networks: ', count($networks), PHP_EOL;
```
## Manual testing
### Create tests
```php
use TelQ\Sdk\Models\Destination;
use TelQ\Sdk\Models\Tests;

// new Destination('mcc', 'mnc', 'ported from mnc')
$sendTests = Tests::fromArray([
    'destinationNetworks' => [
        new Destination('222', '36', '10'),
        new Destination('505', '01')
    ]
]);
$tests = $api->sendTests($sendTests);
foreach ($tests as $test) {
    echo 'Id: ', $test->getId(), PHP_EOL;
    echo 'PhoneNumber: ', $test->getPhoneNumber(), PHP_EOL;
    echo 'TestIdText: ', $test->getTestIdText(), PHP_EOL;
    echo 'Error message: ', $test->getErrorMessage() ?: 'empty', PHP_EOL;
    echo 'Destination:', PHP_EOL;
    echo '    Mcc: ', $test->getDestinationNetwork()->getMcc(), PHP_EOL;
    echo '    Mnc: ', $test->getDestinationNetwork()->getMnc(), PHP_EOL;
    echo '    Ported from mnc: ', $test->getDestinationNetwork()->getPortedFromMnc() ?: 'empty', PHP_EOL;
    echo PHP_EOL;
}

// advanced example
// docs https://api-doc.telqtele.com/#request-details
$sendTests = Tests::fromArray([
    'destinationNetworks' => [
        new Destination('222', '36', '10'),
        new Destination('505', '01')
    ],
    'resultsCallbackUrl' => 'https://my-domain.com/telq-callback',
    'maxCallbackRetries' => 3,
    'testIdTextType' => 'ALPHA',
    'testIdTextCase' => 'MIXED',
    'testIdTextLength' => 6,
    'testTimeToLiveInSeconds' => 3600
]);
```
### Get test result
```php
$result = $api->getTestResult(13777294);
echo 'Id: ', $result->getId(), PHP_EOL;
echo 'TestIdText: ', $result->getTestIdText(), PHP_EOL;
echo 'Sender delivered: ', $result->getSenderDelivered() ?: 'empty', PHP_EOL;
echo 'Text delivered: ', $result->getTextDelivered() ?: 'empty', PHP_EOL;
echo 'Test created: ', $result->getTestCreatedAt()->format('Y-m-d H:i:s'), PHP_EOL; // return DateTime https://www.php.net/manual/en/class.datetime.php
echo 'Sms received: ', $result->getSmsReceivedAt() ? $result->getSmsReceivedAt()->format('Y-m-d H:i:s'): 'empty', PHP_EOL;
echo 'Receipt delay: ', $result->getReceiptDelay() ?: 'empty', PHP_EOL;
echo 'Test status: ', $result->getTestStatus(), PHP_EOL;
echo 'Network:', PHP_EOL;
if ($result->getDestinationNetworkDetails()) {
    echo '    Mcc: ', $result->getDestinationNetworkDetails()->getMcc(), PHP_EOL;
    echo '    Country name: ', $result->getDestinationNetworkDetails()->getCountryName(), PHP_EOL;
    echo '    Mnc: ', $result->getDestinationNetworkDetails()->getMnc(), PHP_EOL;
    echo '    Provider name: ', $result->getDestinationNetworkDetails()->getProviderName(), PHP_EOL;
    echo '    Ported from mnc: ', $result->getDestinationNetworkDetails()->getPortedFromMnc() ?: 'empty', PHP_EOL;
    echo '    Ported from provider name: ', $result->getDestinationNetworkDetails()->getPortedFromProviderName() ?: 'empty', PHP_EOL;
} else {
    echo '    empty', PHP_EOL;
}
echo 'Smsc info:', PHP_EOL;
if ($result->getSmscInfo()) {
    echo '    Smsc number: ', $result->getSmscInfo()->getSmscNumber() ?: 'empty', PHP_EOL;
    echo '    Country name: ', $result->getSmscInfo()->getCountryName() ?: 'empty', PHP_EOL;
    echo '    Country code: ', $result->getSmscInfo()->getCountryCode() ?: 'empty', PHP_EOL;
    echo '    Mcc: ', $result->getSmscInfo()->getMcc() ?: 'empty', PHP_EOL;
    echo '    Mnc: ', $result->getSmscInfo()->getMnc() ?: 'empty', PHP_EOL;
    echo '    Provider name: ', $result->getSmscInfo()->getProviderName() ?: 'empty', PHP_EOL;
} else {
    echo '    empty', PHP_EOL;
}
echo 'Pdu delivered: ', $result->getPdusDelivered() ? implode(', ', $result->getPdusDelivered()) : 'empty', PHP_EOL;
```
### Search tests results
```php
// last 20 results
$results = $api->getManualTestsResults(0, 20, 'desc');
echo 'Page: ', $results->getPage(), PHP_EOL;
echo 'Size: ', $results->getSize(), PHP_EOL;
echo 'Order: ', $results->getOrder(), PHP_EOL;
echo 'Error: ', $results->getError() ?: 'empty', PHP_EOL;
foreach ($results->getContent() as $result) {
    echo 'Id: ', $result->getId(), PHP_EOL;
    echo 'TestIdText: ', $result->getTestIdText(), PHP_EOL;
}

// today tests
$range = new RangeFilter(
    new DateTime('today 00:00:00'),
    new DateTime('today 23:59:59')
);
$results = $api->getManualTestsResults(0, 20, 'desc', $range);
echo 'Page: ', $results->getPage(), PHP_EOL;
echo 'Size: ', $results->getSize(), PHP_EOL;
echo 'Order: ', $results->getOrder(), PHP_EOL;
echo 'Error: ', $results->getError() ?: 'empty', PHP_EOL;
foreach ($results->getContent() as $result) {
    echo 'Id: ', $result->getId(), PHP_EOL;
    echo 'TestIdText: ', $result->getTestIdText(), PHP_EOL;
}
```

## Live number testing
### Create tests
```php
use TelQ\Sdk\Models\Lnt\LiveNumberTest;
use TelQ\Sdk\Models\Lnt\LiveNumberTests;
use TelQ\Sdk\Models\UdhTlv;

$sendTests = LiveNumberTests::fromArray([
    'tests' => [
        LiveNumberTest::fromArray([
            'sender' => 'Google',
            'text' => 'message',
            'supplierId' => 946,
            'mcc' => '262',
            'mnc' => '14'
        ])
    ]
]);
$response = $api->sendLiveNumberTests($sendTests);
foreach ($response->getTests() as $test) {
    echo 'Id: ', $test->getId(), PHP_EOL;
    echo 'PhoneNumber: ', $test->getPhoneNumber(), PHP_EOL;
    echo 'TestIdText: ', $test->getTestIdText(), PHP_EOL;
    echo 'Error message: ', $test->getErrorMessage() ?: 'empty', PHP_EOL;
    echo 'Destination:', PHP_EOL;
    echo '    Mcc: ', $test->getDestinationNetwork()->getMcc(), PHP_EOL;
    echo '    Mnc: ', $test->getDestinationNetwork()->getMnc(), PHP_EOL;
    echo '    Ported from mnc: ', $test->getDestinationNetwork()->getPortedFromMnc() ?: 'empty', PHP_EOL;
    echo PHP_EOL;
}
echo 'Error: ', $response->getError(), PHP_EOL;

// advanced example
$sendTests = LiveNumberTests::fromArray([
    'tests' => [
        LiveNumberTest::fromArray([
            'sender' => 'Google',
            'text' => 'message',
            'testIdTextType' => 'ALPHA',
            'testIdTextCase' => 'LOWER',
            'testIdTextLength' => 7,
            'supplierId' => 946,
            'mcc' => '262',
            'mnc' => '14',
            'portedFromMnc' => '01'
        ])
    ],
    'resultsCallbackUrl' => 'https://some-callback-url.com/some-path',
    'maxCallbackRetries' => 1,
    'dataCoding' => '01',  // 00, 01, 03, 08, F0
    'sourceTon' => '01', // 00, 01, 02, 03, 04, 05, 06
    'sourceNpi' => '12', // 00, 01, 03, 04, 06, 08, 09, 0A, 0E, 12
    'testTimeToLiveInSeconds' => 600,
    'smppValidityPeriod' => 120,
    'scheduledDeliveryTime' => new DateTime(),
    'replaceIfPresentFlag' => 0,
    'priorityFlag' => 1,
    'sendTextAsMessagePayloadTlv' => 0,
    'commentText' => 'Optional comment',
    'tlv' => [
        new UdhTlv('1B1A', '1AAF')
    ],  
    'udh' => [
        new UdhTlv('1F', '11BB')
    ], 
]);
```
### Search tests results
```php
// last 20 results
$results = $api->getLiveNumberTestsResults(0, 20, 'desc');
echo 'Page: ', $results->getPage(), PHP_EOL;
echo 'Size: ', $results->getSize(), PHP_EOL;
echo 'Order: ', $results->getOrder(), PHP_EOL;
echo 'Error: ', $results->getError() ?: 'empty', PHP_EOL;
foreach ($results->getContent() as $result) {
    echo 'Id: ', $result->getId(), PHP_EOL;
    echo 'TestIdText: ', $result->getTestIdText(), PHP_EOL;
    echo 'DLR status: ', $result->getDlrStatus(), PHP_EOL;
    echo 'Receipt status: ', $result->getReceiptStatus(), PHP_EOL;
}

// today tests
$range = new RangeFilter(
    new DateTime('today 00:00:00'),
    new DateTime('today 23:59:59')
);
$results = $api->getLiveNumberTestsResults(0, 20, 'desc', $range);
echo 'Page: ', $results->getPage(), PHP_EOL;
echo 'Size: ', $results->getSize(), PHP_EOL;
echo 'Order: ', $results->getOrder(), PHP_EOL;
echo 'Error: ', $results->getError() ?: 'empty', PHP_EOL;
foreach ($results->getContent() as $result) {
    echo 'Id: ', $result->getId(), PHP_EOL;
    echo 'TestIdText: ', $result->getTestIdText(), PHP_EOL;
    echo 'DLR status: ', $result->getDlrStatus(), PHP_EOL;
    echo 'Receipt status: ', $result->getReceiptStatus(), PHP_EOL, PHP_EOL;
}
```
# Configuration
## Http client
```php
use TelQ\Sdk\Api;
use TelQ\Sdk\Http\CurlClient;

$appId = 123;
$appKey = 'my-key';

$httpClient = new CurlClient([
    // curl options https://www.php.net/manual/en/function.curl-setopt.php
    CURLOPT_CONNECTTIMEOUT => 5
])

$api = new Api($appId, $appKey, $httpClient);
```
## Token storage
To improve performance, the SDK can store the authorization token in a file. Thus, the token will be updated only when necessary, which will avoid unnecessary authorization requests. The file must be writable and readable
```php
use TelQ\Sdk\Api;
use TelQ\Sdk\Http\CurlClient;
use TelQ\Sdk\Token\FileStorage;

$appId = 123;
$appKey = 'my-key';
$httpClient = new CurlClient();

$tokenStorage = new FileStorage('/path/to/token');

$api = new Api($appId, $appKey, $httpClient, $tokenStorage);
```