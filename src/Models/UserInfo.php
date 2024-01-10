<?php

namespace TelQ\Sdk\Models;

class UserInfo
{
    /** @var int|null */
    private $id;
    /** @var string|null */
    private $email;
    /** @var string|null */
    private $username;
    /** @var string|null */
    private $fullName;

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
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string|null
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string|null $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return string|null
     */
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * @param string|null $fullName
     */
    public function setFullName($fullName)
    {
        $this->fullName = $fullName;
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
        if (isset($data['email'])) {
            $model->setEmail($data['email']);
        }
        if (isset($data['fullName'])) {
            $model->setFullName($data['fullName']);
        }
        if (isset($data['username'])) {
            $model->setUsername($data['username']);
        }

        return $model;
    }
}