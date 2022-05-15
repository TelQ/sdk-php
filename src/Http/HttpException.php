<?php

namespace TelQ\Sdk\Http;


class HttpException extends \RuntimeException
{
    private $response;

    /**
     * @param string $message
     * @param Response $response
     * @param \Exception|null $previous
     */
    public function __construct($message, Response $response, $previous = null)
    {
        $this->response = $response;
        parent::__construct($message, $response->getStatus(), $previous);
    }

    /**
     * @return Response
     */
    public function getResponse()
    {
        return $this->response;
    }
}