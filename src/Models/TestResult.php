<?php

namespace TelQ\Sdk\Models;

class TestResult
{
    /** @var int */
    private $id;
    /** @var string */
    private $testIdText;
    /** @var string */
    private $senderDelivered;
    /** @var string */
    private $textDelivered;
    /** @var \DateTime */
    private $testCreatedAt;
    /** @var \DateTime */
    private $smsReceivedAt;
    /** @var int */
    private $receiptDelay;
    /** @var string */
    private $testStatus;
    /** @var Network */
    private $destinationNetworkDetails;
    /** @var SmscInfo */
    private $smscInfo;
    /** @var string[] */
    private $pdusDelivered = [];

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getTestIdText()
    {
        return $this->testIdText;
    }

    /**
     * @param string $testIdText
     */
    public function setTestIdText($testIdText)
    {
        $this->testIdText = $testIdText;
    }

    /**
     * @return string
     */
    public function getSenderDelivered()
    {
        return $this->senderDelivered;
    }

    /**
     * @param string $senderDelivered
     */
    public function setSenderDelivered($senderDelivered)
    {
        $this->senderDelivered = $senderDelivered;
    }

    /**
     * @return string
     */
    public function getTextDelivered()
    {
        return $this->textDelivered;
    }

    /**
     * @param string $textDelivered
     */
    public function setTextDelivered($textDelivered)
    {
        $this->textDelivered = $textDelivered;
    }

    /**
     * @return \DateTime
     */
    public function getTestCreatedAt()
    {
        return $this->testCreatedAt;
    }

    /**
     * @param \DateTime $testCreatedAt
     */
    public function setTestCreatedAt(\DateTime $testCreatedAt)
    {
        $this->testCreatedAt = $testCreatedAt;
    }

    /**
     * @return \DateTime|null
     */
    public function getSmsReceivedAt()
    {
        return $this->smsReceivedAt;
    }

    /**
     * @param \DateTime $smsReceivedAt
     */
    public function setSmsReceivedAt(\DateTime $smsReceivedAt)
    {
        $this->smsReceivedAt = $smsReceivedAt;
    }

    /**
     * @return int|null
     */
    public function getReceiptDelay()
    {
        return $this->receiptDelay;
    }

    /**
     * @param int $receiptDelay
     */
    public function setReceiptDelay($receiptDelay)
    {
        $this->receiptDelay = $receiptDelay;
    }

    /**
     * @return string
     */
    public function getTestStatus()
    {
        return $this->testStatus;
    }

    /**
     * @param string $testStatus
     */
    public function setTestStatus($testStatus)
    {
        $this->testStatus = $testStatus;
    }

    /**
     * @return Network
     */
    public function getDestinationNetworkDetails()
    {
        return $this->destinationNetworkDetails;
    }

    /**
     * @param Network $destinationNetworkDetails
     */
    public function setDestinationNetworkDetails(Network $destinationNetworkDetails)
    {
        $this->destinationNetworkDetails = $destinationNetworkDetails;
    }

    /**
     * @return SmscInfo
     */
    public function getSmscInfo()
    {
        return $this->smscInfo;
    }

    /**
     * @param SmscInfo $smscInfo
     */
    public function setSmscInfo(SmscInfo $smscInfo)
    {
        $this->smscInfo = $smscInfo;
    }

    /**
     * @return string[]
     */
    public function getPdusDelivered()
    {
        return $this->pdusDelivered;
    }

    /**
     * @param string[] $pdusDelivered
     */
    public function setPdusDelivered(array $pdusDelivered)
    {
        $this->pdusDelivered = $pdusDelivered;
    }

    /**
     * @param array $data
     * @return static
     * @throws \Exception
     */
    public static function fromArray(array $data)
    {
        $model = new self();
        $model->setId($data['id']);
        $model->setTestIdText($data['testIdText']);
        $model->setSenderDelivered($data['senderDelivered']);
        $model->setTextDelivered($data['textDelivered']);
        $model->setTestCreatedAt(new \DateTime($data['testCreatedAt']));
        if ($data['smsReceivedAt']) {
            $model->setSmsReceivedAt(new \DateTime($data['smsReceivedAt']));
        }
        $model->setReceiptDelay($data['receiptDelay']);
        $model->setTestStatus($data['testStatus']);
        if (isset($data['destinationNetworkDetails']) and $data['destinationNetworkDetails']) {
            $model->setDestinationNetworkDetails(Network::fromArray($data['destinationNetworkDetails']));
        }
        if (isset($data['smscInfo']) and $data['smscInfo']) {
            $model->setSmscInfo(SmscInfo::fromArray($data['smscInfo']));
        }
        if ($data['pdusDelivered']) {
            $model->setPdusDelivered($data['pdusDelivered']);
        }

        return $model;
    }
}