<?php

namespace TelQ\Sdk\Models;

class SmscInfo
{
    /** @var string */
    private $smscNumber;
    /** @var string */
    private $mcc;
    /** @var string */
    private $countryName;
    /** @var string */
    private $countryCode;
    /** @var string */
    private $mnc;
    /** @var string */
    private $providerName;

    /**
     * @return string
     */
    public function getSmscNumber()
    {
        return $this->smscNumber;
    }

    /**
     * @param string $smscNumber
     */
    public function setSmscNumber($smscNumber)
    {
        $this->smscNumber = $smscNumber;
    }

    /**
     * @return string
     */
    public function getMcc()
    {
        return $this->mcc;
    }

    /**
     * @param string $mcc
     */
    public function setMcc($mcc)
    {
        $this->mcc = $mcc;
    }

    /**
     * @return string
     */
    public function getCountryName()
    {
        return $this->countryName;
    }

    /**
     * @param string $countryName
     */
    public function setCountryName($countryName)
    {
        $this->countryName = $countryName;
    }

    /**
     * @return string
     */
    public function getCountryCode()
    {
        return $this->countryCode;
    }

    /**
     * @param string $countryCode
     */
    public function setCountryCode($countryCode)
    {
        $this->countryCode = $countryCode;
    }

    /**
     * @return string
     */
    public function getMnc()
    {
        return $this->mnc;
    }

    /**
     * @param string $mnc
     */
    public function setMnc($mnc)
    {
        $this->mnc = $mnc;
    }

    /**
     * @return string
     */
    public function getProviderName()
    {
        return $this->providerName;
    }

    /**
     * @param string $providerName
     */
    public function setProviderName($providerName)
    {
        $this->providerName = $providerName;
    }

    /**
     * @param array $data
     * @return static
     */
    public static function fromArray(array $data)
    {
        $model = new self();
        $model->setSmscNumber($data['smscNumber']);
        $model->setMcc($data['mcc']);
        $model->setCountryName($data['countryName']);
        $model->setCountryCode($data['countryCode']);
        $model->setMnc($data['mnc']);
        $model->setProviderName($data['providerName']);

        return $model;
    }
}