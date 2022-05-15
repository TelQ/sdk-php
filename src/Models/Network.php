<?php

namespace TelQ\Sdk\Models;

class Network
{
    /** @var string */
    private $mcc;
    /** @var string */
    private $countryName;
    /** @var string */
    private $mnc;
    /** @var string */
    private $providerName;
    /** @var string|null */
    private $portedFromMnc;
    /** @var string|null */
    private $portedFromProviderName;

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
     * @return string|null
     */
    public function getPortedFromMnc()
    {
        return $this->portedFromMnc;
    }

    /**
     * @param string $portedFromMnc
     */
    public function setPortedFromMnc($portedFromMnc)
    {
        $this->portedFromMnc = $portedFromMnc;
    }

    /**
     * @return string|null
     */
    public function getPortedFromProviderName()
    {
        return $this->portedFromProviderName;
    }

    /**
     * @param string $portedFromProviderName
     */
    public function setPortedFromProviderName($portedFromProviderName)
    {
        $this->portedFromProviderName = $portedFromProviderName;
    }

    /**
     * @param array $data
     * @return static
     */
    public static function fromArray(array $data)
    {
        $model = new self();
        $model->setMcc($data['mcc']);
        $model->setCountryName($data['countryName']);
        $model->setMnc($data['mnc']);
        $model->setProviderName($data['providerName']);
        if (isset($data['portedFromMnc'])) {
            $model->setPortedFromMnc($data['portedFromMnc']);
        }
        if (isset($data['portedFromProviderName'])) {
            $model->setPortedFromProviderName($data['portedFromProviderName']);
        }

        return $model;
    }
}