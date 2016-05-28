<?php

namespace Modules\Location;

use Modules\Location\Mappers\LocationMapper;

use Modules\Location\Models\Location;
use Modules\Location\Models\LocationCollection;

class LocationService extends \Modules\LibraryModule\AbstractService
{

    private $mapper = null;

    /**
     * LocationService constructor.
     */
    public function __construct()
    {
        $this->setMapper(new LocationMapper());
    }

    /**
     * Show all locations
     * @param string $accessToken
     * @return \Modules\Location\Models\LocationCollection
     */
    public function show($accessToken = '')
    {
        $this->getMapper()->setAccessToken($accessToken);

        $result = $this->getMapper()->show();

        $collection = new LocationCollection();
        foreach ($result as $key => $item) {
            $collection->addItem($this->getMapper()->buildObject($item), $key);
        }

        return $collection;
    }

    /**
     * Show a single location
     * @param integer $id
     * @param string $accessToken
     * @return \Modules\Location\Models\Location
     */
    public function get($id = 0, $accessToken = '')
    {
        $this->getMapper()->setAccessToken($accessToken);
        return $this->getMapper()->get($id);
    }

    /**
     * Insert new location
     * @param string $address
     * @param string $address2
     * @param string $city
     * @param string $state
     * @param string $zipCode
     * @param string $country
     * @param float $longitude
     * @param float $latitude
     * @param string $accessToken
     * @return \Modules\Location\Models\Location
     */
    public function insert($address = '', $address2 = '', $city = '', $state = '', $zipCode = '', $country = '', $longitude = 0.0, $latitude = 0.0, $accessToken = '')
    {
        $this->getMapper()->setAccessToken($accessToken);

        $location = new Location(0, $address, $address2, $city, $state, $zipCode, $country, $longitude, $latitude);
        return $this->getMapper()->insert($location->toArray());
    }

    /**
     * Update single location
     * @param integer $id
     * @param string $address
     * @param string $address2
     * @param string $city
     * @param string $state
     * @param string $zipCode
     * @param string $country
     * @param float $longitude
     * @param float $latitude
     * @param string $accessToken
     * @return \Modules\Location\Models\Location
     */
    public function update($id = 0, $address = '', $address2 = '', $city = '', $state = '', $zipCode = '', $country = '', $longitude = 0.0, $latitude = 0.0, $accessToken = '')
    {
        $this->getMapper()->setAccessToken($accessToken);
        $location = new Location($id, $address, $address2, $city, $state, $zipCode, $country, $longitude, $latitude);
        return $this->getMapper()->update($id, $location->toArray());
    }

    /**
     * Delete location
     * @param integer $id
     * @param string $accessToken
     * @return bool
     */
    public function delete($id = 0, $accessToken = '')
    {
        $this->getMapper()->setAccessToken($accessToken);
        return $this->getMapper()->delete($id);
    }


    /**
     * @return LocationMapper
     */
    protected function getMapper()
    {
        return $this->mapper;
    }

    /**
     * @param $client
     * @return $this
     */
    protected function setMapper($client)
    {
        $this->mapper = $client;
        return $this;
    }

}