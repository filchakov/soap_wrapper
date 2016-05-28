<?php

namespace Modules\User;

use Modules\User\Mappers\UserMapper;
use Modules\User\Models\User;
use Modules\User\Models\UserCollection;

class UserService extends \Modules\LibraryModule\AbstractService
{

    private $mapper = null;

    /**
     * UserService constructor.
     */
    public function __construct()
    {
        $this->setMapper(new UserMapper());
    }

    /**
     * Show all users
     * @param string $accessToken
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
     * @param string $accessToken
     * @return \Modules\User\Models\User
     */
    public function get($id = 0, $accessToken = '')
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
     * @param integer $disabled
     * @param integer $isDriver
     * @param string $accessToken
     * @return \Modules\User\Models\User
     */
    public function insert($firstName = '', $lastName = '', $username = '', $email = '', $disabled = 0, $isDriver = 0, $accessToken = '')
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
     * @param integer $disabled
     * @param integer $isDriver
     * @param string $accessToken
     * @return \Modules\User\Models\User
     */
    public function update($id = 0, $firstName = '', $lastName = '', $username = '', $email = '', $disabled = 0, $isDriver = 0, $accessToken = '')
    {
        $this->getMapper()->setAccessToken($accessToken);
        $user = new User($id, $firstName, $lastName, $username, $email, $disabled, $isDriver);
        return $this->getMapper()->update($id, $user->toArray());
    }

    /**
     * Delete user
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

}