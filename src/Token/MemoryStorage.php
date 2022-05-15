<?php

namespace TelQ\Sdk\Token;

use TelQ\Sdk\Models\Token;

class MemoryStorage implements TokenStorageInterface
{
    private $token;

    /**
     * @param Token $token
     * @return void
     */
    public function set(Token $token)
    {
        $this->token = $token;
    }

    /**
     * @return Token
     */
    public function get()
    {
        if (!$this->token) {
            return new Token(0, '');
        }

        return $this->token;
    }

}