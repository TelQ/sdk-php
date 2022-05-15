<?php

namespace TelQ\Sdk;

use TelQ\Sdk\Http\ClientInterface;
use TelQ\Sdk\Http\CurlClient;
use TelQ\Sdk\Http\HttpException;
use TelQ\Sdk\Http\Response;
use TelQ\Sdk\Models\Credentials;
use TelQ\Sdk\Models\ModelInterface;
use TelQ\Sdk\Models\Network;
use TelQ\Sdk\Models\Test;
use TelQ\Sdk\Models\TestResult;
use TelQ\Sdk\Models\Tests;
use TelQ\Sdk\Models\Token;
use TelQ\Sdk\Token\MemoryStorage;
use TelQ\Sdk\Token\TokenStorageInterface;

class Api
{
    const BASE_URL = 'https://api.telqtele.com/v2.1/client';

    private $httpClient;

    private $tokenStorage;

    private $token;

    private $credentials;

    /**
     * @param int $appId
     * @param string $appKey
     * @param ClientInterface|null $httpClient
     * @param TokenStorageInterface|null $tokenStorage
     */
    public function __construct(
        $appId,
        $appKey,
        ClientInterface $httpClient = null,
        TokenStorageInterface $tokenStorage = null
    ) {
        $this->credentials = new Credentials($appId, $appKey);
        $this->httpClient = $httpClient ?: new CurlClient();
        $this->tokenStorage = $tokenStorage ?: new MemoryStorage();
    }

    /**
     * @return Network[]
     */
    public function getNetworks()
    {
        $this->requireAuth();

        return array_map(function ($network) {
            return Network::fromArray($network);
        }, $this->request('GET', '/networks')->getParsedBody());
    }

    /**
     * @param int $id
     * @return TestResult
     */
    public function getTestResult($id)
    {
        $this->requireAuth();

        return TestResult::fromArray(
            $this->request('GET', '/results/' . $id)->getParsedBody()
        );
    }

    /**
     * @param Tests $tests
     * @return Test[]
     */
    public function sendTests(Tests $tests)
    {
        $this->requireAuth();

        return array_map(function ($test) {
            return Test::fromArray($test);
        }, $this->request('POST', '/tests', $tests)->getParsedBody());
    }

    private function requireAuth()
    {
        if (!$this->token) {
            $this->token = $this->tokenStorage->get();
        }

        if ($this->token->isValid()) {
            return;
        }

        $data = $this->request('POST', '/token', $this->credentials)->getParsedBody();
        $this->token = new Token($data['ttl'], $data['value']);
        $this->tokenStorage->set($this->token);
    }

    /**
     * @param string $method
     * @param string $url
     * @param ModelInterface|null $body
     * @return Response
     */
    private function request($method, $url, ModelInterface $body = null)
    {
        $url = self::BASE_URL . '/' . ltrim($url, '/');
        $headers = [
            'accept' => 'application/json',
            'user-agent' => 'php-sdk-1.0.0'
        ];

        if ($this->token and $this->token->getValue()) {
            $headers['Authorization'] = 'Bearer ' . $this->token->getValue();
        }

        $bodyStr = '';
        if ($body) {
            $bodyStr = json_encode($body->toArray());
            $headers['Content-Type'] = 'application/json';
        }

        $response = $this->httpClient->request($method, $url, $headers, $bodyStr);

        if (!$response->isSuccess()) {
            throw new HttpException('Response error', $response);
        }

        return $response;
    }
}