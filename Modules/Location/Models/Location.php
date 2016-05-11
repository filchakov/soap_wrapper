<?php

namespace Modules\Location\Models;

use Modules\LibreryModule\ArraySerializable;

class Location implements ArraySerializable
{
    const ID = 'id';
    const ADDRESS = 'address';
    const ADDRESS2 = 'address2';
    const CITY = 'city';
    const STATE = 'state';
    const ZIP_CODE = 'zipCode';
    const COUNTRY = 'country';
    const LONGITUDE = 'longitude';
    const LATITUDE = 'latitude';

    /**
     * @var int
     */
    private $id = 0;

    /**
     * @var string
     */
    private $address = '';

    /**
     * @var string
     */
    private $address2 = '';

    /**
     * @var string
     */
    private $city = '';

    /**
     * @var string
     */
    private $state = '';

    /**
     * @var string
     */
    private $zipCode = '';

    /**
     * @var string
     */
    private $country = '';

    /**
     * @var float
     */
    private $longitude = 0.0;

    /**
     * @var float
     */
    private $latitude = 0.0;

    /**
     * Location constructor.
     * @param int $id
     * @param string $address
     * @param string $address2
     * @param string $city
     * @param string $state
     * @param string $zipCode
     * @param string $country
     * @param float $longitude
     * @param float $latitude
     */
    public function __construct($id, $address, $address2, $city, $state, $zipCode, $country, $longitude, $latitude)
    {
        $this
            ->setId($id)
            ->setAddress($address)
            ->setAddress2($address2)
            ->setCity($city)
            ->setState($state)
            ->setZipCode($zipCode)
            ->setCountry($country)
            ->setLongitude($longitude)
            ->setLatitude($latitude);
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
     * @return Location
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param string $address
     * @return Location
     */
    public function setAddress($address)
    {
        $this->address = $address;
        return $this;
    }

    /**
     * @return string
     */
    public function getAddress2()
    {
        return $this->address2;
    }

    /**
     * @param string $address2
     * @return Location
     */
    public function setAddress2($address2)
    {
        $this->address2 = $address2;
        return $this;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $city
     * @return Location
     */
    public function setCity($city)
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param string $state
     * @return Location
     */
    public function setState($state)
    {
        $this->state = $state;
        return $this;
    }

    /**
     * @return string
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }

    /**
     * @param string $zipCode
     * @return Location
     */
    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param string $country
     * @return Location
     */
    public function setCountry($country)
    {
        $this->country = $country;
        return $this;
    }

    /**
     * @return float
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @param float $longitude
     * @return Location
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
        return $this;
    }

    /**
     * @return float
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param float $latitude
     * @return Location
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
        return $this;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            self::ID => $this->getId(),
            self::ADDRESS => $this->getAddress(),
            self::ADDRESS2 => $this->getAddress2(),
            self::CITY => $this->getCity(),
            self::STATE => $this->getState(),
            self::ZIP_CODE => $this->getZipCode(),
            self::COUNTRY => $this->getCountry(),
            self::LONGITUDE => $this->getLongitude(),
            self::LATITUDE => $this->getLatitude()
        ];
    }
}