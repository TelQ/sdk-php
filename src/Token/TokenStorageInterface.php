<?php

namespace TelQ\Sdk\Token;

use TelQ\Sdk\Models\Token;

interface TokenStorageInterface
{
    /**
     * @param Token $token
     * @return void
     */
    public function set(Token $token);

    /**
     * @return Token
     */
    public function get();
}