<?php

namespace TelQ\Sdk\Tests;

use PHPUnit\Framework\TestCase;
use TelQ\Sdk\Http\Response;

class HttpTest extends TestCase
{
    public function testResponse()
    {
        $content = ['foo' => 'bar'];
        $contentStr = json_encode($content);
        $response = new Response(200, ['Content-Type' => ['application/json']], $contentStr);

        $this->assertEquals(200, $response->getStatus());
        $this->assertTrue($response->isSuccess());
        $this->assertEquals(['application/json'], $response->getHeader('content-type'));
        $this->assertEquals($contentStr, $response->getBody());
        $this->assertEquals($content, $response->getParsedBody());
    }
}