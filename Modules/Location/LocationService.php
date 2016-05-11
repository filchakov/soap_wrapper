<?php

namespace Modules\Location;

use Modules\Location\Mappers\LocationMapper;
use Modules\LibreryModule\Collection;

class LocationService
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
     * @return array|Collection
     */
    public function show()
    {
        $result = $this->getMapper()->show();

        $collection = new Collection();
        foreach ($result as $key => $item) {
            $collection->addItem($this->getMapper()->buildObject($item), $key);
        }

        return $collection->get();
    }

    /**
     * Show a single location
     * @param integer $id
     * @return mixed|\Psr\Http\Message\ResponseInterface
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
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function insert(string $address, string $address2, string $city, string $state, string $zipCode, string $country, string $longitude, string $latitude)
    {
        return $this->getMapper()->insert(compact('address', 'address2', 'city', 'state', 'zipCode', 'country', 'longitude', 'latitude'));
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
     * @return bool
     */
    public function update(integer $id, string $address, string $address2, string $city, string $state, string $zipCode, string $country, string $longitude, string $latitude)
    {
        return $this->getMapper()->update($id, compact('address', 'address2', 'city', 'state', 'zipCode', 'country', 'longitude', 'latitude'));
    }

    /**
     * Delete location
     * @param integer $id
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function delete(integer $id)
    {
        return $this->getMapper()->delete($id);
    }


    /**
     * @return LocationMapper
     */
    private function getMapper()
    {
        return $this->mapper;
    }

    /**
     * @param $client
     * @return $this
     */
    private function setMapper($client)
    {
        $this->mapper = $client;
        return $this;
    }

}