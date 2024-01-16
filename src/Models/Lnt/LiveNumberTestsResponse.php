<?php

namespace TelQ\Sdk\Models\Lnt;

class LiveNumberTestsResponse
{
    /** @var LiveNumberTestResponse[] */
    private $tests = [];
    /** @var string|null */
    private $error;

    /**
     * @return LiveNumberTestResponse[]
     */
    public function getTests()
    {
        return $this->tests;
    }

    /**
     * @param LiveNumberTestResponse[] $tests
     */
    public function setTests($tests)
    {
        $this->tests = $tests;
    }

    /**
     * @return string|null
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * @param string|null $error
     */
    public function setError($error)
    {
        $this->error = $error;
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromArray(array $data)
    {
        $model = new self();
        if (isset($data['tests'])) {
            $model->setTests(array_map(function ($t) { return LiveNumberTestResponse::fromArray($t); }, $data['tests']));
        }
        if (isset($data['error'])) {
            $model->setError($data['error']);
        }
        return $model;
    }
}