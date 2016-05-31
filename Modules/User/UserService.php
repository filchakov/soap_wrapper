<?php

namespace Modules\User;

use Modules\User\Mappers\LocationMapper;
use Modules\User\Mappers\UserMapper;
use Modules\User\Models\User;
use Modules\User\Models\UserCollection;

class UserService extends \Modules\LibraryModule\AbstractService
{

    /**
     * @var UserMapper
     */
    private $mapper = null;

    /**
     * @var LocationMapper
     */
    private $locationMapper = null;

    /**
     * UserService constructor.
     */
    public function __construct()
    {
        $this
            ->setMapper(new UserMapper())
            ->setLocationMapper(new LocationMapper());
    }

    /**
     * Show all users
     * @return \Modules\User\Models\UserCollection
     */
    public function show($accessToken = '')
    {
        $this->getMapper()->setAccessToken($accessToken);

        $result = $this->getMapper()->show();

        $collection = new UserCollection();
        foreach ($result as $key => $item) {
            $collection->addItem($this->getMapper()->buildObject($item), $key);
        }

        return $collection;
    }

    /**
     * Show a single user
     * @param string $id
     * @return \Modules\User\Models\User
     */
    public function get(string $id, $accessToken = '')
    {
        $this->getMapper()->setAccessToken($accessToken);
        return $this->getMapper()->get($id);
    }

    /**
     * Insert new user
     * @param string $firstName
     * @param string $lastName
     * @param string $username
     * @param string $email
     * @param string $disabled
     * @param string $isDriver
     * @return \Modules\User\Models\User
     */
    public function insert(string $firstName, string $lastName, string $username, string $email, integer $disabled, integer $isDriver, $accessToken = '')
    {
        $this->getMapper()->setAccessToken($accessToken);
        $user = new User(0, $firstName, $lastName, $username, $email, $disabled, $isDriver);
        return $this->getMapper()->insert($user->toArray());
    }

    /**
     * Update single user
     * @param integer $id
     * @param string $firstName
     * @param string $lastName
     * @param string $username
     * @param string $email
     * @param string $disabled
     * @param string $isDriver
     * @return \Modules\User\Models\User
     */
    public function update(integer $id, string $firstName, string $lastName, string $username, string $email, integer $disabled, integer $isDriver, $accessToken = '')
    {
        $this->getMapper()->setAccessToken($accessToken);
        $user = new User($id, $firstName, $lastName, $username, $email, $disabled, $isDriver);
        return $this->getMapper()->update($id, $user->toArray());
    }

    /**
     * Delete user
     * @param integer $id
     * @return bool
     */
    public function delete(integer $id, $accessToken = '')
    {
        $this->getMapper()->setAccessToken($accessToken);
        return $this->getMapper()->delete($id);
    }

    /**
     * @param string $accessToken
     */

    /**
     * Get user location
     * @param string $username
     * @param string $password
     * @param string $database
     * @param string $server
     * @param int $driverID
     * @param string $accessToken
     * @return \Modules\User\Models\Location
     */
    public function getLocation($username = '', $password = '', $database = '', $server = '', $driverID = 0, $accessToken = ''){

        $this->getLocationMapper()->setAccessToken($accessToken);

        $result = $this->getLocationMapper()->insert([
            'username' => $username,
            'password' => $password,
            'database' => $database,
            'server' => $server,
            'driverID' => $driverID
        ]);

        return $this->getLocationMapper()->buildObject($result);
    }

    /**
     * @return UserMapper
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

    /**
     * @return LocationMapper
     */
    protected function getLocationMapper()
    {
        return $this->locationMapper;
    }

    /**
     * @param LocationMapper $locationMapper
     * @return UserService
     */
    protected function setLocationMapper($locationMapper)
    {
        $this->locationMapper = $locationMapper;
        return $this;
    }

}