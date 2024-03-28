<?php

namespace TelQ\Sdk\Models;

class UdhTlv extends BaseModel
{
    /** @var string */
    private $tagHex;

    /** @var string */
    private $valueHex;

    /**
     * @param string $tagHex
     * @param string $valueHex
     */
    public function __construct($tagHex = null, $valueHex = null)
    {
        if ($tagHex !== null) {
            $this->tagHex = $tagHex;
        }
        if ($valueHex !== null) {
            $this->valueHex = $valueHex;
        }
    }


    /**
     * @return string
     */
    public function getTagHex()
    {
        return $this->tagHex;
    }

    /**
     * @param string $tagHex
     */
    public function setTagHex($tagHex)
    {
        $this->tagHex = $tagHex;
    }

    /**
     * @return string
     */
    public function getValueHex()
    {
        return $this->valueHex;
    }

    /**
     * @param string $valueHex
     */
    public function setValueHex($valueHex)
    {
        $this->valueHex = $valueHex;
    }

    protected static function getProperties()
    {
        return ['tagHex', 'valueHex'];
    }
}