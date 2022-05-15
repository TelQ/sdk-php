<?php

namespace TelQ\Sdk\Http;

interface ClientInterface
{
    /**
     * @param string $method
     * @param string $url
     * @param array $headers
     * @param string $body
     * @return Response
     */
    public function request($method, $url, array $headers, $body);
}