<?php

namespace Modules\User\Models;

use Modules\LibraryModule\ArraySerializable;

class Location implements ArraySerializable
{
    const LATITUDE = 'latitude';
    const LONGITUDE = 'longitude';

    /**
     * @var float
     */
    public $longitude = 0.0;

    /**
     * @var float
     */
    public $latitude = 0.0;

    /**
     * Location constructor.
     * @param float $longitude
     * @param float $latitude
     */
    public function __construct($longitude, $latitude)
    {
        $this
            ->setLatitude($latitude)
            ->setLongitude($longitude);
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
           self::LATITUDE => $this->getLatitude(),
           self::LONGITUDE => $this->getLongitude()
        ];
    }
}