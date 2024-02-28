<?php

namespace TelQ\Sdk\Models\Smpp;

use TelQ\Sdk\Models\BaseModel;

class CreateUpdateSession extends BaseModel
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
    private $password;

    /** @var string */
    private $systemType;

    /** @var int */
    private $throughput;

    /** @var int */
    private $destinationTon;

    /** @var int */
    private $destinationNpi;

    /** @var bool */
    private $enabled = false;

    /** @var int */
    private $windowSize;

    /** @var bool */
    private $useSSL;

    /** @var int */
    private $windowWaitTimeout;

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
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
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
     * @return int
     */
    public function getThroughput()
    {
        return $this->throughput;
    }

    /**
     * @param int $throughput
     */
    public function setThroughput($throughput)
    {
        $this->throughput = $throughput;
    }

    /**
     * @return int
     */
    public function getDestinationTon()
    {
        return $this->destinationTon;
    }

    /**
     * @param int $destinationTon
     */
    public function setDestinationTon($destinationTon)
    {
        $this->destinationTon = $destinationTon;
    }

    /**
     * @return int
     */
    public function getDestinationNpi()
    {
        return $this->destinationNpi;
    }

    /**
     * @param int $destinationNpi
     */
    public function setDestinationNpi($destinationNpi)
    {
        $this->destinationNpi = $destinationNpi;
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

    /**
     * @return int
     */
    public function getWindowSize()
    {
        return $this->windowSize;
    }

    /**
     * @param int $windowSize
     */
    public function setWindowSize($windowSize)
    {
        $this->windowSize = $windowSize;
    }

    /**
     * @return bool
     */
    public function getUseSSL()
    {
        return $this->useSSL;
    }

    /**
     * @param bool $useSSL
     */
    public function setUseSSL($useSSL)
    {
        $this->useSSL = $useSSL;
    }

    /**
     * @return int
     */
    public function getWindowWaitTimeout()
    {
        return $this->windowWaitTimeout;
    }

    /**
     * @param int $windowWaitTimeout
     */
    public function setWindowWaitTimeout($windowWaitTimeout)
    {
        $this->windowWaitTimeout = $windowWaitTimeout;
    }

    protected static function getProperties(): array
    {
        return [
            'smppSessionId',
            'hostIp',
            'hostPort',
            'systemId',
            'password',
            'systemType',
            'throughput',
            'destinationTon',
            'destinationNpi',
            'enabled',
            'windowSize',
            'useSSL',
            'windowWaitTimeout'
        ];
    }
}