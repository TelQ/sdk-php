<?php

namespace TelQ\Sdk\Http;

class TestClient implements ClientInterface
{
    private $responses ;

    private $currentResponse = 0;

    /**
     * @param Response[] $responses
     */
    public function __construct($responses)
    {
        $this->responses = $responses;
    }

    /**
     * @param string $method
     * @param string $url
     * @param array $headers
     * @param string $body
     * @return Response
     */
    public function request($method, $url, array $headers, $body)
    {
        $response = $this->responses[$this->currentResponse];
        $this->currentResponse++;
        return $response;
    }

}