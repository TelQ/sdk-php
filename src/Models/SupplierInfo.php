<?php

namespace TelQ\Sdk\Models;

class SupplierInfo
{
    /** @var int|null */
    private $id;
    /** @var string|null */
    private $title;
    /** @var string|null */
    private $routeType;

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
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string|null $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string|null
     */
    public function getRouteType()
    {
        return $this->routeType;
    }

    /**
     * @param string|null $routeType
     */
    public function setRouteType($routeType)
    {
        $this->routeType = $routeType;
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
        if (isset($data['title'])) {
            $model->setTitle($data['title']);
        }
        if (isset($data['routeType'])) {
            $model->setRouteType($data['routeType']);
        }

        return $model;
    }
}