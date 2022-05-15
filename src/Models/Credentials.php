<?php

namespace TelQ\Sdk\Models;

class Credentials implements ModelInterface
{
    private $appId;

    private $appKey;

    /**
     * @param int $appId
     * @param string $appKey
     */
    public function __construct($appId, $appKey)
    {
        $this->appId = $appId;
        $this->appKey = $appKey;
    }

    /**
     * @return int
     */
    public function getAppId()
    {
        return $this->appId;
    }

    /**
     * @return string
     */
    public function getAppKey()
    {
        return $this->appKey;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'appId' => $this->getAppId(),
            'appKey' => $this->getAppKey()
        ];
    }
}