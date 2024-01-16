<?php

namespace TelQ\Sdk\Models\Lnt;

use TelQ\Sdk\Models\Destination;

class LiveNumberTestResponse
{
    /** @var int|null */
    private $id;
    /** @var string|null */
    private $testIdText;
    /** @var string|null */
    private $phoneNumber;
    /** @var Destination */
    private $destinationNetwork;
    /** @var string|null */
    private $testIdTextType;
    /** @var string|null */
    private $testIdTextCase;
    /** @var int|null */
    private $testIdTextLength;
    /** @var string|null */
    private $errorMessage;

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
     * @return Destination
     */
    public function getDestinationNetwork()
    {
        return $this->destinationNetwork;
    }

    /**
     * @param Destination $destinationNetwork
     */
    public function setDestinationNetwork($destinationNetwork)
    {
        $this->destinationNetwork = $destinationNetwork;
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
     * @return string|null
     */
    public function getErrorMessage()
    {
        return $this->errorMessage;
    }

    /**
     * @param string|null $errorMessage
     */
    public function setErrorMessage($errorMessage)
    {
        $this->errorMessage = $errorMessage;
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromArray(array $data)
    {
        $model = new self();
        if (isset($data['id'])) {
            $model->setId($data['id']);
        }
        if (isset($data['testIdText'])) {
            $model->setTestIdText($data['testIdText']);
        }
        if (isset($data['phoneNumber'])) {
            $model->setPhoneNumber($data['phoneNumber']);
        }
        if (isset($data['destinationNetwork'])) {
            $d = $data['destinationNetwork'];
            $model->setDestinationNetwork(new Destination($d['mcc'], $d['mnc'], isset($d['portedFromMnc']) ? $d['portedFromMnc'] : null));
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
        if (isset($data['errorMessage'])) {
            $model->setErrorMessage($data['errorMessage']);
        }

        return $model;
    }
}