<?php

namespace TelQ\Sdk\Models\Smpp;

use TelQ\Sdk\Models\BaseModel;
use TelQ\Sdk\Models\UdhTlv;

class CreateUpdateSupplierResponse extends BaseModel
{
    /** @var int */
    private $supplierId;

    /** @var string */
    private $supplierName;

    /** @var string */
    private $routeType;

    /** @var string[] */
    private $attributeList = [];

    /** @var string */
    private $comment;

    /** @var string */
    private $serviceType;

    /** @var int */
    private $smppSessionId;

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
    public function getAttributeList()
    {
        return $this->attributeList;
    }

    /**
     * @param string[] $attributeList
     */
    public function setAttributeList($attributeList)
    {
        $this->attributeList = $attributeList;
    }

    /**
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param string $comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    }

    /**
     * @return string
     */
    public function getServiceType()
    {
        return $this->serviceType;
    }

    /**
     * @param string $serviceType
     */
    public function setServiceType($serviceType)
    {
        $this->serviceType = $serviceType;
    }

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

    protected static function getProperties(): array
    {
        return [
            'supplierId',
            'supplierName',
            'routeType',
            'attributeList',
            'comment',
            'serviceType',
            'smppSessionId',
        ];
    }
}