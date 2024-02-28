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
use TelQ\Sdk\Models\Smpp\AssignSuppliers;
use TelQ\Sdk\Models\Smpp\CreateUpdateSession;
use TelQ\Sdk\Models\Smpp\CreateUpdateSessionResponse;
use TelQ\Sdk\Models\Smpp\CreateUpdateSupplier;
use TelQ\Sdk\Models\Smpp\CreateUpdateSupplierResponse;
use TelQ\Sdk\Models\Smpp\SearchSession;
use TelQ\Sdk\Models\Smpp\SearchSessionPage;
use TelQ\Sdk\Models\Smpp\SearchSupplier;
use TelQ\Sdk\Models\Smpp\SearchSupplierPage;
use TelQ\Sdk\Models\Smpp\SessionSupplierPage;
use TelQ\Sdk\Models\Test;
use TelQ\Sdk\Models\TestResult;
use TelQ\Sdk\Models\Tests;
use TelQ\Sdk\Models\TestsResults;
use TelQ\Sdk\Models\Token;
use TelQ\Sdk\Token\MemoryStorage;
use TelQ\Sdk\Token\TokenStorageInterface;

class Api
{
    const BASE_URL = 'https://api.dev.telqtele.com';

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

    /**
     * @param CreateUpdateSession $session
     * @return CreateUpdateSessionResponse
     */
    public function createSession(CreateUpdateSession $session)
    {
        $this->requireAuth();
        return CreateUpdateSessionResponse::fromArray(
            $this->request('POST', Url::create('/v3/client/sessions'), $session)->getParsedBody()
        );
    }

    /**
     * @param CreateUpdateSession $session
     * @return void
     */
    public function updateSession(CreateUpdateSession $session)
    {
        $this->requireAuth();
        $this->request('PUT', Url::create('/v3/client/sessions'), $session);
    }

    /**
     * @param int $id
     * @return SearchSession
     */
    public function getSession(int $id)
    {
        $this->requireAuth();
        return SearchSession::fromArray(
            $this->request('GET', Url::create('/v3/client/sessions/' . $id))->getParsedBody()
        );
    }

    /**
     * @param $page
     * @param $size
     * @param $order
     * @return SearchSessionPage
     */
    public function getSessions($page = 0, $size = 20, $order = 'asc')
    {
        $this->requireAuth();
        $params = [
            'page' => $page,
            'size' => $size,
            'sort' => 'id,' . $order
        ];
        return SearchSessionPage::fromArray(
            $this->request('GET', Url::create('/v3/client/sessions', $params))->getParsedBody()
        );
    }

    /**
     * @param int $id
     * @return void
     */
    public function deleteSession(int $id)
    {
        $this->requireAuth();
        $this->request('DELETE', Url::create('/v3/client/sessions/' . $id));
    }

    /**
     * @param CreateUpdateSupplier $supplier
     * @return CreateUpdateSupplierResponse
     */
    public function createSupplier(CreateUpdateSupplier $supplier)
    {
        $this->requireAuth();
        return CreateUpdateSupplierResponse::fromArray(
            $this->request('POST', Url::create('/v3/client/suppliers'), $supplier)->getParsedBody()
        );
    }

    /**
     * @param CreateUpdateSupplier $supplier
     * @return void
     */
    public function updateSupplier(CreateUpdateSupplier $supplier)
    {
        $this->requireAuth();
        $this->request('PUT', Url::create('/v3/client/suppliers'), $supplier);
    }

    /**
     * @param int $id
     * @return void
     */
    public function deleteSupplier(int $id)
    {
        $this->requireAuth();
        $this->request('DELETE', Url::create('/v3/client/suppliers/' . $id));
    }

    /**
     * @param int $id
     * @return SearchSupplier
     */
    public function getSupplier(int $id)
    {
        $this->requireAuth();
        return SearchSupplier::fromArray(
            $this->request('GET', Url::create('/v3/client/suppliers/' . $id))->getParsedBody()
        );
    }

    /**
     * @param $page
     * @param $size
     * @param $order
     * @return SearchSupplierPage
     */
    public function getSuppliers($page = 0, $size = 20, $order = 'asc')
    {
        $this->requireAuth();
        $params = [
            'page' => $page,
            'size' => $size,
            'sort' => 'id,' . $order
        ];
        return SearchSupplierPage::fromArray(
            $this->request('GET', Url::create('/v3/client/suppliers', $params))->getParsedBody()
        );
    }

    /**
     * @param int $sessionId sessionId
     * @return SearchSupplier[]
     */
    public function getSuppliersBySessionId(int $sessionId)
    {
        $this->requireAuth();
        return array_map(
            [SearchSupplier::class, 'fromArray'],
            $this->request('GET', Url::create('/v3/client/sessions/' . $sessionId . '/suppliers'))->getParsedBody()
        );
    }

    public function assignSuppliersToSession(array $supplierIds, $sessionId)
    {
        $this->requireAuth();
        $body = new AssignSuppliers($supplierIds, $sessionId);
        $this->request('POST', Url::create('/v3/client/suppliers/assign'), $body);
    }

    /**
     * @param $page
     * @param $size
     * @param $order
     * @return SessionSupplierPage
     */
    public function getSessionsSuppliers($page = 0, $size = 20, $order = 'asc')
    {
        $this->requireAuth();
        $params = [
            'page' => $page,
            'size' => $size,
            'sort' => 'id,' . $order
        ];
        return SessionSupplierPage::fromArray(
            $this->request('GET', Url::create('/v3/client/sessions-suppliers', $params))->getParsedBody()
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