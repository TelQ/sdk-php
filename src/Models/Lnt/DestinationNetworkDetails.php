<?php

namespace TelQ\Sdk\Models\Lnt;

class DestinationNetworkDetails
{
    /** @var string|null */
    private $mcc;
    /** @var string|null */
    private $mnc;
    /** @var string|null */
    private $portedFromMnc;
    /** @var string|null */
    private $countryName;
    /** @var string|null */
    private $providerName;
    /** @var string|null */
    private $portedFromProviderName;
    /** @var string|null */
    private $phoneNumber;

    /**
     * @return string|null
     */
    public function getMcc()
    {
        return $this->mcc;
    }

    /**
     * @param string|null $mcc
     */
    public function setMcc($mcc)
    {
        $this->mcc = $mcc;
    }

    /**
     * @return string|null
     */
    public function getMnc()
    {
        return $this->mnc;
    }

    /**
     * @param string|null $mnc
     */
    public function setMnc($mnc)
    {
        $this->mnc = $mnc;
    }

    /**
     * @return string|null
     */
    public function getPortedFromMnc()
    {
        return $this->portedFromMnc;
    }

    /**
     * @param string|null $portedFromMnc
     */
    public function setPortedFromMnc($portedFromMnc)
    {
        $this->portedFromMnc = $portedFromMnc;
    }

    /**
     * @return string|null
     */
    public function getCountryName()
    {
        return $this->countryName;
    }

    /**
     * @param string|null $countryName
     */
    public function setCountryName($countryName)
    {
        $this->countryName = $countryName;
    }

    /**
     * @return string|null
     */
    public function getProviderName()
    {
        return $this->providerName;
    }

    /**
     * @param string|null $providerName
     */
    public function setProviderName($providerName)
    {
        $this->providerName = $providerName;
    }

    /**
     * @return string|null
     */
    public function getPortedFromProviderName()
    {
        return $this->portedFromProviderName;
    }

    /**
     * @param string|null $portedFromProviderName
     */
    public function setPortedFromProviderName($portedFromProviderName)
    {
        $this->portedFromProviderName = $portedFromProviderName;
    }

    /**
     * @return string|null
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * @param string|null $phoneNumber
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromArray(array $data)
    {
        $model = new self();
        if (isset($data['mcc'])) {
            $model->setMcc($data['mcc']);
        }
        if (isset($data['countryName'])) {
            $model->setCountryName($data['countryName']);
        }
        if (isset($data['mnc'])) {
            $model->setMnc($data['mnc']);
        }
        if (isset($data['providerName'])) {
            $model->setProviderName($data['providerName']);
        }
        if (isset($data['portedFromMnc'])) {
            $model->setPortedFromMnc($data['portedFromMnc']);
        }
        if (isset($data['portedFromProviderName'])) {
            $model->setPortedFromProviderName($data['portedFromProviderName']);
        }
        if (isset($data['phoneNumber'])) {
            $model->setPhoneNumber($data['phoneNumber']);
        }

        return $model;
    }
}