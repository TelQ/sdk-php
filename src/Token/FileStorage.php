<?php

namespace TelQ\Sdk\Token;

use TelQ\Sdk\Models\Token;

class FileStorage implements TokenStorageInterface
{
    private $path;

    /**
     * @param string $path
     */
    public function __construct($path)
    {
        $isFile = is_file($path);
        if (!$isFile and !is_writable(dirname($path))) {
            throw new \RuntimeException('Path must be writable');
        }

        if ($isFile and !is_writable($path)) {
            throw new \RuntimeException('Path must be writable');
        }

        $this->path = $path;
    }

    /**
     * @param Token $token
     * @return void
     */
    public function set(Token $token)
    {
        $data = ['ttl' => $token->getTtl(), 'created' => $token->getCreated(), 'value' => $token->getValue()];
        file_put_contents($this->path, serialize($data));
    }

    /**
     * @return Token
     */
    public function get()
    {
        if (!file_exists($this->path)) {
            return new Token(0, '');
        }
        $data = unserialize(file_get_contents($this->path));
        return new Token($data['ttl'], $data['value'], $data['created']);
    }
}