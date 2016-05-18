<?php

namespace Modules\Location;

use Modules\Location\Mappers\LocationMapper;

use Modules\Location\Models\Location;
use Modules\Location\Models\LocationCollection;

class LocationService extends \Modules\LibreryModule\AbstractService
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
     * @return \Modules\Location\Models\LocationCollection
     */
    public function show()
    {
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
     * @return \Modules\Location\Models\Location
     */
    public function get(integer $id)
    {
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
     * @param string $longitude
     * @param string $latitude
     * @return \Modules\Location\Models\Location
     */
    public function insert(string $address, string $address2, string $city, string $state, string $zipCode, string $country, float $longitude, float $latitude)
    {
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
     * @param string $longitude
     * @param string $latitude
     * @return \Modules\Location\Models\Location
     */
    public function update(integer $id, string $address, string $address2, string $city, string $state, string $zipCode, string $country, string $longitude, string $latitude)
    {
        $location = new Location($id, $address, $address2, $city, $state, $zipCode, $country, $longitude, $latitude);
        return $this->getMapper()->update($id, $location->toArray());
    }

    /**
     * Delete location
     * @param integer $id
     * @return bool
     */
    public function delete(integer $id)
    {
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