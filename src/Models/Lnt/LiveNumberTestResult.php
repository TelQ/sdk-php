<?php

namespace TelQ\Sdk\Models\Lnt;

use TelQ\Sdk\Models\SmscInfo;
use TelQ\Sdk\Models\SupplierInfo;
use TelQ\Sdk\Models\UserInfo;

class LiveNumberTestResult
{
    /** @var int|null */
    private $id;
    /** @var string|null */
    private $testIdText;
    /** @var string|null */
    private $senderSent;
    /** @var string|null */
    private $senderDelivered;
    /** @var string|null */
    private $textSent;
    /** @var string|null */
    private $textDelivered;
    /** @var \DateTime|null */
    private $testCreatedAt;
    /** @var int|null */
    private $smppSessionId;
    /** @var SupplierInfo|null */
    private $supplier;
    /** @var \DateTime|null */
    private $smsReceivedAt;
    /** @var string|null */
    private $receiptStatus;
    /** @var string|null */
    private $dlrStatus;
    /** @var int|null */
    private $receiptDelay;
    /** @var int|null */
    private $dlrDelay;
    /** @var int|null */
    private $scheduledTaskId;
    /** @var string|null */
    private $testIdTextType;
    /** @var string|null */
    private $testIdTextCase;
    /** @var int|null */
    private $testIdTextLength;
    /** @var DestinationNetworkDetails|null */
    private $destinationNetworkDetails;
    /** @var SmscInfo|null */
    private $smscInfo;
    /** @var bool|null */
    private $retry;
    /** @var string[] */
    private $pdusDelivered = [];
    /** @var UserInfo|null */
    private $user;

    /**
     * @return int|null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string|null
     */
    public function getTestIdText()
    {
        return $this->testIdText;
    }

    /**
     * @param string|null $testIdText
     */
    public function setTestIdText($testIdText)
    {
        $this->testIdText = $testIdText;
    }

    /**
     * @return string|null
     */
    public function getSenderSent()
    {
        return $this->senderSent;
    }

    /**
     * @param string|null $senderSent
     */
    public function setSenderSent($senderSent)
    {
        $this->senderSent = $senderSent;
    }

    /**
     * @return string|null
     */
    public function getSenderDelivered()
    {
        return $this->senderDelivered;
    }

    /**
     * @param string|null $senderDelivered
     */
    public function setSenderDelivered($senderDelivered)
    {
        $this->senderDelivered = $senderDelivered;
    }

    /**
     * @return string|null
     */
    public function getTextSent()
    {
        return $this->textSent;
    }

    /**
     * @param string|null $textSent
     */
    public function setTextSent($textSent)
    {
        $this->textSent = $textSent;
    }

    /**
     * @return string|null
     */
    public function getTextDelivered()
    {
        return $this->textDelivered;
    }

    /**
     * @param string|null $textDelivered
     */
    public function setTextDelivered($textDelivered)
    {
        $this->textDelivered = $textDelivered;
    }

    /**
     * @return \DateTime|null
     */
    public function getTestCreatedAt()
    {
        return $this->testCreatedAt;
    }

    /**
     * @param \DateTime|null $testCreatedAt
     */
    public function setTestCreatedAt($testCreatedAt)
    {
        $this->testCreatedAt = $testCreatedAt;
    }

    /**
     * @return int|null
     */
    public function getSmppSessionId()
    {
        return $this->smppSessionId;
    }

    /**
     * @param int|null $smppSessionId
     */
    public function setSmppSessionId($smppSessionId)
    {
        $this->smppSessionId = $smppSessionId;
    }

    /**
     * @return SupplierInfo|null
     */
    public function getSupplier()
    {
        return $this->supplier;
    }

    /**
     * @param SupplierInfo|null $supplier
     */
    public function setSupplier($supplier)
    {
        $this->supplier = $supplier;
    }

    /**
     * @return \DateTime|null
     */
    public function getSmsReceivedAt()
    {
        return $this->smsReceivedAt;
    }

    /**
     * @param \DateTime|null $smsReceivedAt
     */
    public function setSmsReceivedAt($smsReceivedAt)
    {
        $this->smsReceivedAt = $smsReceivedAt;
    }

    /**
     * @return string|null
     */
    public function getReceiptStatus()
    {
        return $this->receiptStatus;
    }

    /**
     * @param string|null $receiptStatus
     */
    public function setReceiptStatus($receiptStatus)
    {
        $this->receiptStatus = $receiptStatus;
    }

    /**
     * @return string|null
     */
    public function getDlrStatus()
    {
        return $this->dlrStatus;
    }

    /**
     * @param string|null $dlrStatus
     */
    public function setDlrStatus($dlrStatus)
    {
        $this->dlrStatus = $dlrStatus;
    }

    /**
     * @return int|null
     */
    public function getReceiptDelay()
    {
        return $this->receiptDelay;
    }

    /**
     * @param int|null $receiptDelay
     */
    public function setReceiptDelay($receiptDelay)
    {
        $this->receiptDelay = $receiptDelay;
    }

    /**
     * @return int|null
     */
    public function getDlrDelay()
    {
        return $this->dlrDelay;
    }

    /**
     * @param int|null $dlrDelay
     */
    public function setDlrDelay($dlrDelay)
    {
        $this->dlrDelay = $dlrDelay;
    }

    /**
     * @return int|null
     */
    public function getScheduledTaskId()
    {
        return $this->scheduledTaskId;
    }

    /**
     * @param int|null $scheduledTaskId
     */
    public function setScheduledTaskId($scheduledTaskId)
    {
        $this->scheduledTaskId = $scheduledTaskId;
    }

    /**
     * @return string|null
     */
    public function getTestIdTextType()
    {
        return $this->testIdTextType;
    }

    /**
     * @param string|null $testIdTextType
     */
    public function setTestIdTextType($testIdTextType)
    {
        $this->testIdTextType = $testIdTextType;
    }

    /**
     * @return string|null
     */
    public function getTestIdTextCase()
    {
        return $this->testIdTextCase;
    }

    /**
     * @param string|null $testIdTextCase
     */
    public function setTestIdTextCase($testIdTextCase)
    {
        $this->testIdTextCase = $testIdTextCase;
    }

    /**
     * @return int|null
     */
    public function getTestIdTextLength()
    {
        return $this->testIdTextLength;
    }

    /**
     * @param int|null $testIdTextLength
     */
    public function setTestIdTextLength($testIdTextLength)
    {
        $this->testIdTextLength = $testIdTextLength;
    }

    /**
     * @return DestinationNetworkDetails|null
     */
    public function getDestinationNetworkDetails()
    {
        return $this->destinationNetworkDetails;
    }

    /**
     * @param DestinationNetworkDetails|null $destinationNetworkDetails
     */
    public function setDestinationNetworkDetails($destinationNetworkDetails)
    {
        $this->destinationNetworkDetails = $destinationNetworkDetails;
    }

    /**
     * @return SmscInfo|null
     */
    public function getSmscInfo()
    {
        return $this->smscInfo;
    }

    /**
     * @param SmscInfo|null $smscInfo
     */
    public function setSmscInfo($smscInfo)
    {
        $this->smscInfo = $smscInfo;
    }

    /**
     * @return bool|null
     */
    public function getRetry()
    {
        return $this->retry;
    }

    /**
     * @param bool|null $retry
     */
    public function setRetry($retry)
    {
        $this->retry = $retry;
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
    public function setPdusDelivered($pdusDelivered)
    {
        $this->pdusDelivered = $pdusDelivered;
    }

    /**
     * @return UserInfo|null
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param UserInfo|null $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    public static function fromArray(array $data)
    {
        $model = new self();
        if (isset($data['id'])) {
            $model->setId($data['id']);
        }
        if (isset($data['testIdText'])) {
            $model->setTestIdText($data['testIdText']);
        }
        if (isset($data['senderSent'])) {
            $model->setSenderSent($data['senderSent']);
        }
        if (isset($data['senderDelivered'])) {
            $model->setSenderDelivered($data['senderDelivered']);
        }
        if (isset($data['textSent'])) {
            $model->setTextSent($data['textSent']);
        }
        if (isset($data['testCreatedAt'])) {
            $model->setTestCreatedAt(new \DateTime($data['testCreatedAt']));
        }
        if (isset($data['smppSessionId'])) {
            $model->setSmppSessionId($data['smppSessionId']);
        }
        if (isset($data['supplier'])) {
            $model->setSupplier(SupplierInfo::fromArray($data['supplier']));
        }
        if (isset($data['smsReceivedAt'])) {
            $model->setSmsReceivedAt(new \DateTime($data['smsReceivedAt']));
        }
        if (isset($data['receiptStatus'])) {
            $model->setReceiptStatus($data['receiptStatus']);
        }
        if (isset($data['dlrStatus'])) {
            $model->setDlrStatus($data['dlrStatus']);
        }
        if (isset($data['receiptDelay'])) {
            $model->setReceiptDelay($data['receiptDelay']);
        }
        if (isset($data['dlrDelay'])) {
            $model->setDlrDelay($data['dlrDelay']);
        }
        if (isset($data['scheduledTaskId'])) {
            $model->setScheduledTaskId($data['scheduledTaskId']);
        }
        if (isset($data['testIdTextType'])) {
            $model->setTestIdTextType($data['testIdTextType']);
        }
        if (isset($data['testIdTextCase'])) {
            $model->setTestIdTextCase($data['testIdTextCase']);
        }
        if (isset($data['testIdTextLength'])) {
            $model->setTestIdTextLength($data['testIdTextLength']);
        }
        if (isset($data['destinationNetworkDetails'])) {
            $model->setDestinationNetworkDetails(DestinationNetworkDetails::fromArray($data['destinationNetworkDetails']));
        }
        if (isset($data['smscInfo'])) {
            $model->setSmscInfo(SmscInfo::fromArray($data['smscInfo']));
        }
        if (isset($data['retry'])) {
            $model->setRetry($data['retry']);
        }
        if (isset($data['pdusDelivered'])) {
            $model->setPdusDelivered($data['pdusDelivered']);
        }
        if (isset($data['user'])) {
            $model->setUser(UserInfo::fromArray($data['user']));
        }
        return $model;
    }
}