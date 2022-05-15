<?php

namespace TelQ\Sdk\Models;

class Tests implements ModelInterface
{
    /** @var Destination[] */
    private $destinationNetworks = [];
    /** @var string|null */
    private $resultsCallbackUrl;
    /** @var int|null */
    private $maxCallbackRetries;
    /** @var string|null */
    private $testIdTextType;
    /** @var string|null */
    private $testIdTextCase;
    /** @var int|null */
    private $testIdTextLength;
    /** @var int|null */
    private $testTimeToLiveInSeconds;

    /**
     * @return Destination[]
     */
    public function getDestinationNetworks()
    {
        return $this->destinationNetworks;
    }

    /**
     * @param Destination[] $destinationNetworks
     */
    public function setDestinationNetworks($destinationNetworks)
    {
        $this->destinationNetworks = $destinationNetworks;
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
     * @return string
     */
    public function getTestIdTextType()
    {
        return $this->testIdTextType;
    }

    /**
     * @param string $testIdTextType
     */
    public function setTestIdTextType($testIdTextType)
    {
        $this->testIdTextType = $testIdTextType;
    }

    /**
     * @return string
     */
    public function getTestIdTextCase()
    {
        return $this->testIdTextCase;
    }

    /**
     * @param string $testIdTextCase
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
     * @param int $testIdTextLength
     */
    public function setTestIdTextLength($testIdTextLength)
    {
        $this->testIdTextLength = $testIdTextLength;
    }

    /**
     * @return int|null
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
     * @return array
     */
    public function toArray()
    {
        $data = [
            'destinationNetworks' => array_map(function (Destination $d) {
                return $d->toArray();
            }, $this->getDestinationNetworks())
        ];
        if ($this->getMaxCallbackRetries()) {
            $data['maxCallbackRetries'] = $this->getMaxCallbackRetries();
        }
        if ($this->getTestIdTextType()) {
            $data['testIdTextType'] = $this->getTestIdTextType();
        }
        if ($this->getTestIdTextCase()) {
            $data['testIdTextCase'] = $this->getTestIdTextCase();
        }
        if ($this->getTestIdTextLength()) {
            $data['testIdTextLength'] = $this->getTestIdTextLength();
        }
        if ($this->getTestTimeToLiveInSeconds()) {
            $data['testTimeToLiveInSeconds'] = $this->getTestTimeToLiveInSeconds();
        }

        return $data;
    }

    /**
     * @param array $data
     * @return Tests
     */
    public static function fromArray($data)
    {
        $model = new self();
        $model->setDestinationNetworks($data['destinationNetworks']);
        if (isset($data['resultsCallbackUrl'])) {
            $model->setResultsCallbackUrl($data['resultsCallbackUrl']);
        }
        if (isset($data['maxCallbackRetries'])) {
            $model->setMaxCallbackRetries($data['maxCallbackRetries']);
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
        if (isset($data['testTimeToLiveInSeconds'])) {
            $model->setTestTimeToLiveInSeconds($data['testTimeToLiveInSeconds']);
        }

        return $model;
    }
}