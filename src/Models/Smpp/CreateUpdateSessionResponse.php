<?php

namespace TelQ\Sdk\Models\Smpp;

use TelQ\Sdk\Models\BaseModel;

class CreateUpdateSessionResponse extends BaseModel
{
    /** @var int */
    private $smppSessionId;

    /** @var string */
    private $hostIp;

    /** @var int */
    private $hostPort;

    /** @var string */
    private $systemId;

    /** @var string */
    private $systemType;

    /** @var bool */
    private $enabled;

    /**
     * @return int
     */
    public function getSmppSessionId()
    {
        return $this->smppSessionId;
    }

    /**
     * @param int $smppSessionId
     */
    public function setSmppSessionId($smppSessionId)
    {
        $this->smppSessionId = $smppSessionId;
    }

    /**
     * @return string
     */
    public function getHostIp()
    {
        return $this->hostIp;
    }

    /**
     * @param string $hostIp
     */
    public function setHostIp($hostIp)
    {
        $this->hostIp = $hostIp;
    }

    /**
     * @return int
     */
    public function getHostPort()
    {
        return $this->hostPort;
    }

    /**
     * @param int $hostPort
     */
    public function setHostPort($hostPort)
    {
        $this->hostPort = $hostPort;
    }

    /**
     * @return string
     */
    public function getSystemId()
    {
        return $this->systemId;
    }

    /**
     * @param string $systemId
     */
    public function setSystemId($systemId)
    {
        $this->systemId = $systemId;
    }

    /**
     * @return string
     */
    public function getSystemType()
    {
        return $this->systemType;
    }

    /**
     * @param string $systemType
     */
    public function setSystemType($systemType)
    {
        $this->systemType = $systemType;
    }
    /**
     * @return bool
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * @param bool $enabled
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;
    }

    protected static function getProperties(): array
    {
        return [
            'smppSessionId',
            'hostIp',
            'hostPort',
            'systemId',
            'systemType',
            'enabled'
        ];
    }
}