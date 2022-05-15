<?php

namespace TelQ\Sdk\Tests;

use PHPUnit\Framework\TestCase;
use TelQ\Sdk\Api;
use TelQ\Sdk\Http\Response;
use TelQ\Sdk\Http\TestClient;
use TelQ\Sdk\Models\Destination;
use TelQ\Sdk\Models\Network;
use TelQ\Sdk\Models\SmscInfo;
use TelQ\Sdk\Models\Tests;

class ApiTest extends TestCase
{
    public function testNetworks()
    {
        $networks = [
            [
                'mcc' => '262',
                'countryName' => 'Germany',
                'mnc' => '02',
                'providerName' => 'Vodafone',
                'portedFromMnc' => '07',
                'portedFromProviderName' => 'Provider'
            ],
            [
                'mcc' => '505',
                'countryName' => 'Australia',
                'mnc' => '02',
                'providerName' => 'Optus'
            ]
        ];
        $httpClient = new TestClient([
            $this->createResponse(200, ['ttl' => 3600, 'value' => '']),
            $this->createResponse(200, $networks)
        ]);
        $api = new Api(123, 'key', $httpClient);

        $networksResponse = $api->getNetworks();

        $this->assertEquals($networks[0]['mcc'], $networksResponse[0]->getMcc());
        $this->assertEquals($networks[0]['mnc'], $networksResponse[0]->getMnc());
        $this->assertEquals($networks[0]['portedFromMnc'], $networksResponse[0]->getPortedFromMnc());

        $this->assertEquals($networks[1]['mcc'], $networksResponse[1]->getMcc());
        $this->assertEquals($networks[1]['mnc'], $networksResponse[1]->getMnc());
        $this->assertNull($networksResponse[1]->getPortedFromMnc());
    }

    public function testSend()
    {
        $tests = [
            [
                'id' => 894562,
                'phoneNumber' => '33611223344',
                'testIdText' => 'zlrtyrvdl',
                'errorMessage' => null,
                'destinationNetwork' => [
                    'mcc' => '208',
                    'mnc' => '10',
                    'portedFromMnc' => '20'
                ]
            ]
        ];
        $httpClient = new TestClient([
            $this->createResponse(200, ['ttl' => 3600, 'value' => '']),
            $this->createResponse(200, $tests)
        ]);
        $api = new Api(123, 'key', $httpClient);

        $testsResponse = $api->sendTests(Tests::fromArray([
            'destinationNetworks' => [new Destination('208', '10', '20')]
        ]));

        $this->assertEquals($tests[0]['id'], $testsResponse[0]->getId());
        $this->assertEquals($tests[0]['phoneNumber'], $testsResponse[0]->getPhoneNumber());
        $this->assertEquals($tests[0]['testIdText'], $testsResponse[0]->getTestidText());
        $this->assertNull($testsResponse[0]->getErrorMessage());

        $this->assertEquals(new Destination('208', '10', '20'), $testsResponse[0]->getDestinationNetwork());
    }

    public function testResult()
    {
        $result = [
            'id' => 23,
            'testIdText' =>'irrgprny',
            'senderDelivered' =>'+4944557775544',
            'textDelivered' =>'irrgprny fgsfgsd',
            'testCreatedAt' =>'2020-02-13T17:01:54.352886Z',
            'smsReceivedAt' =>'2020-02-13T17:05:27Z',
            'receiptDelay' => 213,
            'testStatus' =>'POSITIVE',
            'destinationNetworkDetails' => [
                'mcc' => '206',
                'mnc' => '10',
                'portedFromMnc' => '20',
                'countryName' => 'France',
                'providerName' => 'French Provider',
                'portedFromProviderName' => 'Ported French Provider'
            ],
            'smscInfo' =>[
                'smscNumber' =>null,
                'countryName' =>'France',
                'countryCode' =>'FR',
                'mcc' =>null,
                'mnc' =>null,
                'providerName' =>null
            ],
            'pdusDelivered' =>['07913348466110F3040D91945102131605F60880022032225771611165B93BBF0ECBDD7990F93C345FE764']
        ];
        $httpClient = new TestClient([
            $this->createResponse(200, ['ttl' => 3600, 'value' => '']),
            $this->createResponse(200, $result)
        ]);
        $api = new Api(123, 'key', $httpClient);

        $resultResponse = $api->getTestResult(23);

        $this->assertEquals($result['id'], $resultResponse->getId());
        $this->assertEquals($result['testIdText'], $resultResponse->getTestIdText());
        $this->assertEquals($result['senderDelivered'], $resultResponse->getSenderDelivered());
        $this->assertEquals($result['textDelivered'], $resultResponse->getTextDelivered());
        $this->assertEquals(new \DateTime($result['testCreatedAt']), $resultResponse->getTestCreatedAt());
        $this->assertEquals(new \DateTime($result['smsReceivedAt']), $resultResponse->getSmsReceivedAt());
        $this->assertEquals($result['receiptDelay'], $resultResponse->getReceiptDelay());
        $this->assertEquals($result['testStatus'], $resultResponse->getTestStatus());
        $this->assertEquals(Network::fromArray($result['destinationNetworkDetails']), $resultResponse->getDestinationNetworkDetails());
        $this->assertEquals(SmscInfo::fromArray($result['smscInfo']), $resultResponse->getSmscInfo());
        $this->assertEquals($result['pdusDelivered'][0], $resultResponse->getPdusDelivered()[0]);

    }

    /**
     * @param int $status
     * @param array $data
     * @return Response
     */
    private function createResponse($status, $data)
    {
        $content = json_encode($data);
        return new Response($status, ['Content-Type' => ['application/json']], $content);
    }
}