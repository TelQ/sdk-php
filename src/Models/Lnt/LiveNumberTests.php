<?php

namespace TelQ\Sdk\Models\Lnt;

use TelQ\Sdk\Models\ModelInterface;
use TelQ\Sdk\Models\UdhTlv;

class LiveNumberTests implements ModelInterface
{
    /** @var LiveNumberTest[] */
    private $tests = [];
    /** @var string|null */
    private $resultsCallbackUrl;
    /** @var int */
    private $maxCallbackRetries = 1;
    /** @var string|null */
    private $dataCoding;
    /** @var string|null */
    private $sourceTon;
    /** @var string|null */
    private $sourceNpi;
    /** @var int */
    private $testTimeToLiveInSeconds = 3600;
    /** @var int|null */
    private $smppValidityPeriod;
    /** @var \DateTime|null */
    private $scheduledDeliveryTime;
    /** @var int|null */
    private $replaceIfPresentFlag;
    /** @var int|null */
    private $priorityFlag;
    /** @var int|null */
    private $sendTextAsMessagePayloadTlv;
    /** @var string|null */
    private $commentText;
    /** @var UdhTlv[] */
    private $tlv = [];
    /** @var UdhTlv[] */
    private $udh = [];

    /**
     * @return LiveNumberTest[]
     */
    public function getTests()
    {
        return $this->tests;
    }

    /**
     * @param LiveNumberTest[] $tests
     */
    public function setTests($tests)
    {
        $this->tests = $tests;
    }

    /**
     * @return string|null
     */
    public function getResultsCallbackUrl()
    {
        return $this->resultsCallbackUrl;
    }

    /**
     * @param string|null $resultsCallbackUrl
     */
    public function setResultsCallbackUrl($resultsCallbackUrl)
    {
        $this->resultsCallbackUrl = $resultsCallbackUrl;
    }

    /**
     * @return int
     */
    public function getMaxCallbackRetries()
    {
        return $this->maxCallbackRetries;
    }

    /**
     * @param int $maxCallbackRetries
     */
    public function setMaxCallbackRetries($maxCallbackRetries)
    {
        $this->maxCallbackRetries = $maxCallbackRetries;
    }

    /**
     * @return string|null
     */
    public function getDataCoding()
    {
        return $this->dataCoding;
    }

    /**
     * @param string|null $dataCoding
     */
    public function setDataCoding($dataCoding)
    {
        $this->dataCoding = $dataCoding;
    }

    /**
     * @return string|null
     */
    public function getSourceTon()
    {
        return $this->sourceTon;
    }

    /**
     * @param string|null $sourceTon
     */
    public function setSourceTon($sourceTon)
    {
        $this->sourceTon = $sourceTon;
    }

    /**
     * @return string|null
     */
    public function getSourceNpi()
    {
        return $this->sourceNpi;
    }

    /**
     * @param string|null $sourceNpi
     */
    public function setSourceNpi($sourceNpi)
    {
        $this->sourceNpi = $sourceNpi;
    }

    /**
     * @return int
     */
    public function getTestTimeToLiveInSeconds()
    {
        return $this->testTimeToLiveInSeconds;
    }

    /**
     * @param int $testTimeToLiveInSeconds
     */
    public function setTestTimeToLiveInSeconds($testTimeToLiveInSeconds)
    {
        $this->testTimeToLiveInSeconds = $testTimeToLiveInSeconds;
    }

    /**
     * @return int|null
     */
    public function getSmppValidityPeriod()
    {
        return $this->smppValidityPeriod;
    }

    /**
     * @param int|null $smppValidityPeriod
     */
    public function setSmppValidityPeriod($smppValidityPeriod)
    {
        $this->smppValidityPeriod = $smppValidityPeriod;
    }

    /**
     * @return \DateTime|null
     */
    public function getScheduledDeliveryTime()
    {
        return $this->scheduledDeliveryTime;
    }

    /**
     * @param \DateTime|null $scheduledDeliveryTime
     */
    public function setScheduledDeliveryTime($scheduledDeliveryTime)
    {
        $this->scheduledDeliveryTime = $scheduledDeliveryTime;
    }

    /**
     * @return int|null
     */
    public function getReplaceIfPresentFlag()
    {
        return $this->replaceIfPresentFlag;
    }

    /**
     * @param int|null $replaceIfPresentFlag
     */
    public function setReplaceIfPresentFlag($replaceIfPresentFlag)
    {
        $this->replaceIfPresentFlag = $replaceIfPresentFlag;
    }

    /**
     * @return int|null
     */
    public function getPriorityFlag()
    {
        return $this->priorityFlag;
    }

    /**
     * @param int|null $priorityFlag
     */
    public function setPriorityFlag($priorityFlag)
    {
        $this->priorityFlag = $priorityFlag;
    }

    /**
     * @return int|null
     */
    public function getSendTextAsMessagePayloadTlv()
    {
        return $this->sendTextAsMessagePayloadTlv;
    }

    /**
     * @param int|null $sendTextAsMessagePayloadTlv
     */
    public function setSendTextAsMessagePayloadTlv($sendTextAsMessagePayloadTlv)
    {
        $this->sendTextAsMessagePayloadTlv = $sendTextAsMessagePayloadTlv;
    }

    /**
     * @return string|null
     */
    public function getCommentText()
    {
        return $this->commentText;
    }

    /**
     * @param string|null $commentText
     */
    public function setCommentText($commentText)
    {
        $this->commentText = $commentText;
    }

    /**
     * @return UdhTlv[]
     */
    public function getTlv()
    {
        return $this->tlv;
    }

    /**
     * @param UdhTlv[] $tlv
     */
    public function setTlv($tlv)
    {
        $this->tlv = $tlv;
    }

    /**
     * @return UdhTlv[]
     */
    public function getUdh()
    {
        return $this->udh;
    }

    /**
     * @param UdhTlv[] $udh
     */
    public function setUdh($udh)
    {
        $this->udh = $udh;
    }

    public static function fromArray(array $data)
    {
        $model = new self();
        if (isset($data['tests'])) {
            $model->setTests($data['tests']);
        }
        if (isset($data['resultsCallbackUrl'])) {
            $model->setResultsCallbackUrl($data['resultsCallbackUrl']);
        }
        if (isset($data['maxCallbackRetries'])) {
            $model->setMaxCallbackRetries($data['maxCallbackRetries']);
        }
        if (isset($data['dataCoding'])) {
            $model->setDataCoding($data['dataCoding']);
        }
        if (isset($data['sourceTon'])) {
            $model->setSourceTon($data['sourceTon']);
        }
        if (isset($data['sourceNpi'])) {
            $model->setSourceNpi($data['sourceNpi']);
        }
        if (isset($data['testTimeToLiveInSeconds'])) {
            $model->setTestTimeToLiveInSeconds($data['testTimeToLiveInSeconds']);
        }
        if (isset($data['smppValidityPeriod'])) {
            $model->setSmppValidityPeriod($data['smppValidityPeriod']);
        }
        if (isset($data['scheduledDeliveryTime'])) {
            $model->setScheduledDeliveryTime($data['scheduledDeliveryTime']);
        }
        if (isset($data['replaceIfPresentFlag'])) {
            $model->setReplaceIfPresentFlag($data['replaceIfPresentFlag']);
        }
        if (isset($data['priorityFlag'])) {
            $model->setPriorityFlag($data['priorityFlag']);
        }
        if (isset($data['sendTextAsMessagePayloadTlv'])) {
            $model->setSendTextAsMessagePayloadTlv($data['sendTextAsMessagePayloadTlv']);
        }
        if (isset($data['commentText'])) {
            $model->setCommentText($data['commentText']);
        }
        if (isset($data['tlv'])) {
            $model->setTlv($data['tlv']);
        }
        if (isset($data['udh'])) {
            $model->setUdh($data['udh']);
        }

        return $model;
    }

    public function toArray()
    {
        $data = [
            'tests' => array_map(function ($t) { return $t->toArray(); }, $this->getTests()),
        ];
        if ($this->getResultsCallbackUrl()) {
            $data['resultsCallbackUrl'] = $this->getResultsCallbackUrl();
        }
        if ($this->getMaxCallbackRetries()) {
            $data['maxCallbackRetries'] = $this->getMaxCallbackRetries();
        }
        if ($this->getDataCoding() !== null) {
            $data['dataCoding'] = $this->getDataCoding();
        }
        if ($this->getSourceTon() !== null) {
            $data['sourceTon'] = $this->getSourceTon();
        }
        if ($this->getSourceNpi() !== null) {
            $data['sourceNpi'] = $this->getSourceNpi();
        }
        if ($this->getTestTimeToLiveInSeconds()) {
            $data['testTimeToLiveInSeconds'] = $this->getTestTimeToLiveInSeconds();
        }
        if ($this->getSmppValidityPeriod()) {
            $data['smppValidityPeriod'] = $this->getSmppValidityPeriod();
        }
        if ($this->getScheduledDeliveryTime()) {
            $data['scheduledDeliveryTime'] = $this->getScheduledDeliveryTime()->format('YYMMDDhhmmss0000');
        }
        if ($this->getReplaceIfPresentFlag() !== null) {
            $data['replaceIfPresentFlag'] = $this->getReplaceIfPresentFlag();
        }
        if ($this->getPriorityFlag() !== null) {
            $data['priorityFlag'] = $this->getPriorityFlag();
        }
        if ($this->getSendTextAsMessagePayloadTlv() !== null) {
            $data['sendTextAsMessagePayloadTlv'] = $this->getSendTextAsMessagePayloadTlv();
        }
        if ($this->getCommentText()) {
            $data['commentText'] = $this->getCommentText();
        }
        $data['tlv'] = array_map(function ($t) { return $t->toArray(); }, $this->getTlv());
        $data['udh'] = array_map(function ($t) { return $t->toArray(); }, $this->getUdh());

        return $data;
    }
}