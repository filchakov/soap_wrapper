<?php

namespace Modules\User\Models;

use Modules\LibraryModule\ArraySerializable;

class User implements ArraySerializable
{
    const ID = 'id';
    const FIRST_NAME = 'firstName';
    const LAST_NAME = 'lastName';
    const USERNAME = 'username';
    const EMAIL = 'email';
    const DISABLED = 'disabled';
    const IS_DRIVER = 'isDriver';

    /**
     * @var int
     */
    public $id = 0;

    /**
     * @var string
     */
    public $firstName = '';

    /**
     * @var string
     */
    public $lastName = '';

    /**
     * @var string
     */
    public $username = '';

    /**
     * @var string
     */
    public $email = '';

    /**
     * @var integer
     */
    public $disabled = '';

    /**
     * @var integer
     */
    public $isDriver = '';

    /**
     * User constructor.
     * @param int $id
     * @param string $firstName
     * @param string $lastName
     * @param string $username
     * @param string $email
     * @param string $disabled
     * @param string $isDriver
     */
    public function __construct($id, $firstName, $lastName, $username, $email, $disabled, $isDriver)
    {
        $this
            ->setId($id)
            ->setFirstName($firstName)
            ->setLastName($lastName)
            ->setUsername($username)
            ->setEmail($email)
            ->setDisabled($disabled)
            ->setIsDriver($email);
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            self::ID => $this->getId(),
            self::FIRST_NAME => $this->getFirstName(),
            self::LAST_NAME => $this->getLastName(),
            self::USERNAME => $this->getUsername(),
            self::EMAIL => $this->getEmail(),
            self::DISABLED => $this->getDisabled(),
            self::IS_DRIVER => $this->getIsDriver()
        ];
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return $this
     */
    private function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     * @return $this
     */
    private function setFirstName($firstName)
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     * @return $this
     */
    private function setLastName($lastName)
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $username
     * @return $this
     */
    private function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return $this
     */
    private function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getDisabled()
    {
        return $this->disabled;
    }

    /**
     * @param string $disabled
     * @return $this
     */
    private function setDisabled($disabled)
    {
        $this->disabled = $disabled;
        return $this;
    }

    /**
     * @return string
     */
    public function getIsDriver()
    {
        return $this->isDriver;
    }

    /**
     * @param string $isDriver
     * @return $this
     */
    private function setIsDriver($isDriver)
    {
        $this->isDriver = $isDriver;
        return $this;
    }



}