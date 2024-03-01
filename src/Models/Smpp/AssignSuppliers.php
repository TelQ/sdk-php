<?php

namespace TelQ\Sdk\Models\Smpp;

use TelQ\Sdk\Models\ModelInterface;

class AssignSuppliers implements ModelInterface
{
    /** @var int[] */
    private $supplierIds = [];

    /** @var int */
    private $smppSessionId;

    /**
     * @param int[] $supplierIds
     * @param int $smppSessionId
     */
    public function __construct(array $supplierIds, int $smppSessionId)
    {
        $this->supplierIds = $supplierIds;
        $this->smppSessionId = $smppSessionId;
    }

    public function toArray()
    {
        return ['supplierIds' => $this->supplierIds, 'smppSessionId' => $this->smppSessionId];
    }

}