<?php

namespace TelQ\Sdk\Models\Smpp;

use TelQ\Sdk\Models\BaseModel;

class SessionSupplier extends BaseModel
{
    /** @var int */
    private $smppSessionId;

    /** @var int */
    private $supplierId;

    /** @var string */
    private $supplierName;

    /** @var string */
    private $routeType;

    /** @var string[] */
    private $attributes = [];

    /** @var bool */
    private $online = false;

    /**
     * @return int
     */
    public function getSmppSessionId(): int
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
     * @return int
     */
    public function getSupplierId()
    {
        return $this->supplierId;
    }

    /**
     * @param int $supplierId
     */
    public function setSupplierId($supplierId)
    {
        $this->supplierId = $supplierId;
    }

    /**
     * @return string
     */
    public function getSupplierName()
    {
        return $this->supplierName;
    }

    /**
     * @param string $supplierName
     */
    public function setSupplierName($supplierName)
    {
        $this->supplierName = $supplierName;
    }

    /**
     * @return string
     */
    public function getRouteType()
    {
        return $this->routeType;
    }

    /**
     * @param string $routeType
     */
    public function setRouteType($routeType)
    {
        $this->routeType = $routeType;
    }

    /**
     * @return string[]
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * @param string[] $attributes
     */
    public function setAttributes($attributes)
    {
        $this->attributes = $attributes ?: [];
    }

    /**
     * @return bool
     */
    public function getOnline()
    {
        return $this->online;
    }

    /**
     * @param bool $online
     */
    public function setOnline($online)
    {
        $this->online = !!$online;
    }

    protected static function getProperties(): array
    {
        return [
            'smppSessionId',
            'supplierId',
            'supplierName',
            'routeType',
            'online',
            'attributes'
        ];
    }
}