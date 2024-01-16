<?php

namespace TelQ\Sdk\Models;

class UdhTlv implements ModelInterface
{
    private $tagHex;

    private $valueHex;

    public function __construct($tagHex, $valueHex)
    {
        $this->tagHex = $tagHex;
        $this->valueHex = $valueHex;
    }
    public function toArray()
    {
        return [
            'tagHex' => $this->tagHex,
            'valueHex' => $this->valueHex
        ];
    }
}