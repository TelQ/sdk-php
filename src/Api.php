<?php

namespace TelQ\Sdk;

use TelQ\Sdk\Http\ClientInterface;
use TelQ\Sdk\Http\CurlClient;
use TelQ\Sdk\Http\HttpException;
use TelQ\Sdk\Http\Response;
use TelQ\Sdk\Http\Url;
use TelQ\Sdk\Models\Credentials;
use TelQ\Sdk\Models\Lnt\LiveNumberTests;
use TelQ\Sdk\Models\Lnt\LiveNumberTestsResponse;
use TelQ\Sdk\Models\Lnt\LiveNumberTestsResults;
use TelQ\Sdk\Models\ModelInterface;
use TelQ\Sdk\Models\Network;
use TelQ\Sdk\Models\RangeFilter;
use TelQ\Sdk\Models\Test;
use TelQ\Sdk\Models\TestResult;
use TelQ\Sdk\Models\Tests;
use TelQ\Sdk\Models\TestsResults;
use TelQ\Sdk\Models\Token;
use TelQ\Sdk\Token\MemoryStorage;
use TelQ\Sdk\Token\TokenStorageInterface;

class Api
{
    const BASE_URL = 'https://api.telqtele.com';

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
        }, $this->request('GET', '/v3/client/networks')->getParsedBody());
    }

    /**
     * @param int $id
     * @return TestResult
     */
    public function getManualTestResult($id)
    {
        $this->requireAuth();

        return TestResult::fromArray(
            $this->request('GET', '/v3/client/tests/' . $id)->getParsedBody()
        );
    }

    /**
     * @param $page
     * @param $size
     * @param $order
     * @param RangeFilter|null $rangeFilter
     * @return TestsResults
     */
    public function getManualTestsResults($page = 0, $size = 20, $order = 'asc', RangeFilter $rangeFilter = null)
    {
        $this->requireAuth();
        $params = [
            'page' => $page,
            'size' => $size,
            'order' => $order
        ];
        if ($rangeFilter) {
            $params['from'] = $rangeFilter->getFrom()->format("Y-m-d\TH:i:s\.00\Z");
            $params['to'] = $rangeFilter->getTo()->format("Y-m-d\TH:i:s\.00\Z");
        }
        return TestsResults::fromArray(
            $this->request('GET', Url::create('/v3/client/tests', $params))->getParsedBody()
        );
    }

    /**
     * @param Tests $tests
     * @return Test[]
     */
    public function sendManualTests(Tests $tests)
    {
        $this->requireAuth();

        return array_map(function ($test) {
            return Test::fromArray($test);
        }, $this->request('POST', '/v3/client/tests', $tests)->getParsedBody());
    }

    /**
     * @param LiveNumberTests $tests
     * @return LiveNumberTestsResponse
     */
    public function sendLiveNumberTests(LiveNumberTests $tests)
    {
        $this->requireAuth();

        return LiveNumberTestsResponse::fromArray($this->request('POST', '/v3/client/lnt/tests', $tests)->getParsedBody());
    }

    /**
     * @param $page
     * @param $size
     * @param $order
     * @param RangeFilter|null $rangeFilter
     * @return LiveNumberTestsResults
     */
    public function getLiveNumberTestsResults($page = 0, $size = 20, $order = 'asc', RangeFilter $rangeFilter = null)
    {
        $this->requireAuth();
        $params = [
            'page' => $page,
            'size' => $size,
            'order' => $order
        ];
        if ($rangeFilter) {
            $params['from'] = $rangeFilter->getFrom()->format("Y-m-d\TH:i:s\.00\Z");
            $params['to'] = $rangeFilter->getTo()->format("Y-m-d\TH:i:s\.00\Z");
        }
        return LiveNumberTestsResults::fromArray(
            $this->request('GET', Url::create('/v3/client/lnt/tests', $params))->getParsedBody()
        );
    }

    private function requireAuth()
    {
        if (!$this->token) {
            $this->token = $this->tokenStorage->get();
        }

        if ($this->token->isValid()) {
            return;
        }

        $data = $this->request('POST', '/v3/client/token', $this->credentials)->getParsedBody();
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
            'user-agent' => 'php-sdk-2.0.0'
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