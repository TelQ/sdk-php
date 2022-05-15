<?php

namespace TelQ\Sdk\Models;

class Token
{
    private $ttl;

    private $value;

    private $created;

    /**
     * @param int $ttl
     * @param string $value
     * @param int|null $created
     */
    public function __construct($ttl, $value, $created = null)
    {
        $this->ttl = $ttl;
        $this->value = $value;
        $this->created = $created ?: time();
    }

    /**
     * @return int
     */
    public function getTtl()
    {
        return $this->ttl;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return int
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @return bool
     */
    public function isValid()
    {
        return time() < $this->created + $this->ttl;
    }
}