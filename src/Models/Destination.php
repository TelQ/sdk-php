<?php

namespace TelQ\Sdk\Models;

class Destination implements ModelInterface
{
    private $mcc;

    private $mnc;

    private $portedFromMnc;

    public function __construct($mcc, $mnc, $portedFromMnc = null)
    {
        $this->mcc = $mcc;
        $this->mnc = $mnc;
        $this->portedFromMnc = $portedFromMnc;
    }

    /**
     * @return string
     */
    public function getMcc()
    {
        return $this->mcc;
    }

    /**
     * @return string
     */
    public function getMnc()
    {
        return $this->mnc;
    }

    /**
     * @return string|null
     */
    public function getPortedFromMnc()
    {
        return $this->portedFromMnc;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'mcc' => $this->getMcc(),
            'mnc' => $this->getMnc(),
            'portedFromMnc' => $this->getPortedFromMnc()
        ];
    }
}