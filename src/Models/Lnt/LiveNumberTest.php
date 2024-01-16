<?php

namespace TelQ\Sdk\Models\Lnt;

use TelQ\Sdk\Models\ModelInterface;

class LiveNumberTest implements ModelInterface
{
    /** @var string|null */
    private $sender;
    /** @var string|null */
    private $text;
    /** @var string|null */
    private $testIdTextType = 'ALPHA';
    /** @var string|null */
    private $testIdTextCase = 'LOWER';
    /** @var int|null */
    private $testIdTextLength = 7;
    /** @var int|null */
    private $supplierId;
    /** @var string|null */
    private $mcc;
    /** @var string|null */
    private $mnc;
    /** @var string|null */
    private $portedFromMnc;

    /**
     * @return string|null
     */
    public function getSender()
    {
        return $this->sender;
    }

    /**
     * @param string|null $sender
     */
    public function setSender($sender)
    {
        $this->sender = $sender;
    }

    /**
     * @return string|null
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param string|null $text
     */
    public function setText($text)
    {
        $this->text = $text;
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
     * @return int|null
     */
    public function getSupplierId()
    {
        return $this->supplierId;
    }

    /**
     * @param int|null $supplierId
     */
    public function setSupplierId($supplierId)
    {
        $this->supplierId = $supplierId;
    }

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
     * @param array $data
     * @return self
     */
    public static function fromArray(array $data)
    {
        $model = new self();
        if (isset($data['sender'])) {
            $model->setSender($data['sender']);
        }
        if (isset($data['text'])) {
            $model->setText($data['text']);
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
        if (isset($data['supplierId'])) {
            $model->setSupplierId($data['supplierId']);
        }
        if (isset($data['mcc'])) {
            $model->setMcc($data['mcc']);
        }
        if (isset($data['mnc'])) {
            $model->setMnc($data['mnc']);
        }
        if (isset($data['portedFromMnc'])) {
            $model->setPortedFromMnc($data['portedFromMnc']);
        }

        return $model;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'sender' => $this->getSender(),
            'text' => $this->getText(),
            'testIdTextType' => $this->getTestIdTextType(),
            'testIdTextCase' => $this->getTestIdTextCase(),
            'testIdTextLength' => $this->getTestIdTextLength(),
            'supplierId' => $this->getSupplierId(),
            'mcc' => $this->getMcc(),
            'mnc' => $this->getMnc(),
            'portedFromMnc' => $this->getPortedFromMnc()
        ];
    }
}