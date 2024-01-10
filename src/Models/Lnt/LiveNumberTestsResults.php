<?php

namespace TelQ\Sdk\Models\Lnt;

class LiveNumberTestsResults
{
    /** @var LiveNumberTestResult[] */
    private $content = [];
    /** @var int|null */
    private $page;
    /** @var int|null */
    private $size;
    /** @var string|null */
    private $order;
    /** @var string|null */
    private $error;

    /**
     * @return LiveNumberTestResult[]
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param LiveNumberTestResult[] $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return int|null
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * @param int|null $page
     */
    public function setPage($page)
    {
        $this->page = $page;
    }

    /**
     * @return int|null
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @param int|null $size
     */
    public function setSize($size)
    {
        $this->size = $size;
    }

    /**
     * @return string|null
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @param string|null $order
     */
    public function setOrder($order)
    {
        $this->order = $order;
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

    public static function fromArray(array $data)
    {
        $model = new self();
        if (isset($data['content'])) {
            $model->setContent(array_map(function ($t) { return LiveNumberTestResult::fromArray($t); }, $data['content']));
        }
        if (isset($data['page'])) {
            $model->setPage($data['page']);
        }
        if (isset($data['size'])) {
            $model->setSize($data['size']);
        }
        if (isset($data['order'])) {
            $model->setOrder($data['order']);
        }
        if (isset($data['error'])) {
            $model->setError($data['error']);
        }

        return $model;
    }
}