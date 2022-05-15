<?php

namespace TelQ\Sdk\Tests;

use PHPUnit\Framework\TestCase;
use TelQ\Sdk\Models\Token;
use TelQ\Sdk\Token\FileStorage;
use TelQ\Sdk\Token\MemoryStorage;

class TokenTest extends TestCase
{
    public function testIsValidToken()
    {
        $validToken = new Token(3600, '');
        $this->assertTrue($validToken->isValid());

        $notValidToken = new Token(3600, '', time() - 3600);
        $this->assertFalse($notValidToken->isValid());
    }

    public function testMemoryStorage()
    {
        $storage = new MemoryStorage();
        $this->assertEquals(new Token(0, ''), $storage->get());

        $storage->set(new Token(3600, ''));
        $this->assertEquals(new Token(3600, ''), $storage->get());
    }

    public function testFileStorage()
    {
        $path =  sys_get_temp_dir() . '/telq-token';
        if (file_exists($path)) {
            unlink($path);
        }

        $storage = new FileStorage($path);

        $created = time();

        // write token to file
        $storage->set(new Token(3600, '', $created));
        $content = serialize(['ttl' => 3600, 'created' => $created, 'value' => '', ]);
        $this->assertEquals($content, file_get_contents($path));

        // read token from file
        $token = $storage->get();
        $this->assertEquals(new Token(3600, '', $created), $token);

        // not exists token
        unlink($path);
        $this->assertEquals(new Token(0, ''), $storage->get());
    }
}