<?php

namespace TelQ\Sdk\Tests;

use PHPUnit\Framework\TestCase;
use TelQ\Sdk\Models\Smpp\CreateUpdateSession;
use TelQ\Sdk\Models\Smpp\CreateUpdateSessionResponse;
use TelQ\Sdk\Models\Smpp\CreateUpdateSupplier;
use TelQ\Sdk\Models\Smpp\CreateUpdateSupplierResponse;
use TelQ\Sdk\Models\Smpp\SearchSession;
use TelQ\Sdk\Models\Smpp\SearchSupplier;
use TelQ\Sdk\Models\Smpp\SessionSupplier;

class ModelsTest extends TestCase
{
    /**
     * @dataProvider providerModels
     */
    public function testCreateSession($modelClass, array $data)
    {
        $model = call_user_func([$modelClass, 'fromArray'], $data);
        $this->assertEquals($data, $model->toArray());
    }

    public function providerModels()
    {
        return [
            [CreateUpdateSession::class, [
                'smppSessionId' => 1,
                'hostIp' => '127.0.0.1',
                'hostPort' => 9999,
                'systemId' => 'login',
                'password' => 'password',
                'systemType' => null,
                'throughput' => 5,
                'destinationTon' => 1,
                'destinationNpi' => 1,
                'enabled' => false,
                'windowSize' => 1,
                'useSSL' => false,
                'windowWaitTimeout' => null
            ]],
            [CreateUpdateSessionResponse::class, [
                'smppSessionId' => 1,
                'hostIp' => '127.0.0.1',
                'hostPort' => 9999,
                'systemId' => 'login',
                'systemType' => null,
                'enabled' => false
            ]],
            [SearchSession::class, [
                'smppSessionId' => 1,
                'hostIp' => '127.0.0.1',
                'hostPort' => 9999,
                'systemId' => 'login',
                'password' => 'password',
                'systemType' => null,
                'throughput' => 5,
                'destinationTon' => 1,
                'destinationNpi' => 1,
                'enabled' => false,
                'windowSize' => 1,
                'useSSL' => false,
                'windowWaitTimeout' => null,
                'userId' => 1,
                'userName' => 'testUser',
                'online' => false,
                'supplierCount' => 5,
                'lastError' => 'Test error'
            ]],
            [CreateUpdateSupplier::class, [
                'supplierId' => 1,
                'supplierName' => 'name',
                'routeType' => 'test',
                'attributeList' => ['FOO', 'BAR'],
                'comment' => null,
                'serviceType' => 'testType',
                'tlv' => [
                    ['tagHex' => '1400', 'valueHex' => '4234413845353534']
                ],
                'udh' => [
                    ['tagHex' => '33', 'valueHex' => '3333']
                ],
                'smppSessionId' => 2,
            ]],
            [CreateUpdateSupplierResponse::class, [
                'supplierId' => 1,
                'supplierName' => 'name',
                'routeType' => 'test',
                'attributeList' => ['FOO', 'BAR'],
                'comment' => null,
                'serviceType' => 'testType',
                'smppSessionId' => 2,
            ]],
            [SearchSupplier::class, [
                'supplierId' => 1,
                'supplierName' => 'name',
                'routeType' => 'test',
                'attributeList' => ['FOO', 'BAR'],
                'comment' => null,
                'serviceType' => 'testType',
                'tlv' => [
                    ['tagHex' => '1400', 'valueHex' => '4234413845353534']
                ],
                'udh' => [
                    ['tagHex' => '33', 'valueHex' => '3333']
                ],
                'smppSessionId' => 2,
                'userId' => 1
            ]],
            [SessionSupplier::class, [
                'smppSessionId' => 2,
                'supplierId' => 1,
                'supplierName' => 'name',
                'routeType' => 'test',
                'attributes' => ['FOO', 'BAR'],
                'online' => true
            ]],
        ];
    }
}