<?php

namespace TelQ\Sdk\Models;

class Test
{
    /** @var int */
    private $id;
    /** @var string */
    private $phoneNumber;
    /** @var string */
    private $testIdText;
    /** @var string|null */
    private $errorMessage;
    /** @var Destination */
    private $destinationNetwork;

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
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * @param string $phoneNumber
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
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
     * @return string|null
     */
    public function getErrorMessage()
    {
        return $this->errorMessage;
    }

    /**
     * @param string $errorMessage
     */
    public function setErrorMessage($errorMessage)
    {
        $this->errorMessage = $errorMessage;
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
    public function setDestinationNetwork(Destination $destinationNetwork)
    {
        $this->destinationNetwork = $destinationNetwork;
    }

    /**
     * @param array $data
     * @return static
     */
    public static function fromArray(array $data)
    {
        $model = new self();
        $model->setId($data['id']);
        $model->setPhoneNumber($data['phoneNumber']);
        $model->setTestIdText($data['testIdText']);
        if (isset($data['errorMessage']) and $data['errorMessage']) {
            $model->setErrorMessage($data['errorMessage']);
        }
        $d = $data['destinationNetwork'];
        $model->setDestinationNetwork(new Destination($d['mcc'], $d['mnc'], $d['portedFromMnc']));

        return $model;
    }
}