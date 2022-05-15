<?php

namespace TelQ\Sdk\Http;

use RuntimeException;

class Response
{
    private $status;

    private $headers;

    private $body;

    /**
     * @param int $status
     * @param array $headers
     * @param string $body
     */
    public function __construct($status, array $headers, $body)
    {
        $this->status = $status;
        $this->headers = $headers;
        foreach ($this->headers as $name => $value) {
            $this->headers[strtolower($name)] = $value;
        }
        $this->body = $body;
    }

    /**
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return array
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @return bool
     */
    public function isSuccess()
    {
        return $this->status === 200;
    }

    /**
     * @param $name
     * @return array
     */
    public function getHeader($name)
    {
        $name = strtolower($name);
        return isset($this->headers[$name]) ? $this->headers[$name] : [];
    }

    /**
     * @return array
     */
    public function getParsedBody()
    {
        $contentType = implode(' ', $this->getHeader('content-type'));
        if (strpos($contentType, 'application/json') !== false) {
            $parsed = json_decode($this->body, true);
            if (JSON_ERROR_NONE !== json_last_error()) {
                throw new RuntimeException('Unable to parse response body into JSON: ' . json_last_error());
            }
            return $parsed;
        }

        return [];
    }
}