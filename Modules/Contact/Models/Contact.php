<?php

namespace Modules\Contact\Models;

use Modules\LibreryModule\ArraySerializable;

class Contact implements ArraySerializable
{
    const ID = 'id';
    const FIRST_NAME = 'firstName';
    const LAST_NAME = 'lastName';
    const PHONE_NUMBER = 'phoneNumber';
    const EMAIL = 'email';

    /**
     * @var int
     */
    private $id = 0;

    /**
     * @var string
     */
    private $firstName = '';

    /**
     * @var string
     */
    private $lastName = '';

    /**
     * @var string
     */
    private $phoneNumber = '';

    /**
     * @var string
     */
    private $email = '';

    /**
     * Contact constructor.
     * @param int $id
     * @param string $firstName
     * @param string $lastName
     * @param string $phoneNumber
     * @param string $email
     */
    public function __construct($id, $firstName, $lastName, $phoneNumber, $email)
    {
        $this
            ->setId($id)
            ->setFirstName($firstName)
            ->setLastName($lastName)
            ->setPhoneNumber($phoneNumber)
            ->setEmail($email);
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
            self::PHONE_NUMBER => $this->getPhoneNumber(),
            self::EMAIL => $this->getEmail(),
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
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * @param string $phoneNumber
     * @return $this
     */
    private function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
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


}