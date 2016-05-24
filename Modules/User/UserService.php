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
     * @return \Modules\User\Models\UserCollection
     */
    public function show()
    {
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
    public function get(string $id)
    {
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
    public function insert(string $firstName, string $lastName, string $username, string $email, integer $disabled, integer $isDriver)
    {
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
    public function update(integer $id, string $firstName, string $lastName, string $username, string $email, integer $disabled, integer $isDriver)
    {
        $user = new User($id, $firstName, $lastName, $username, $email, $disabled, $isDriver);
        return $this->getMapper()->update($id, $user->toArray());
    }

    /**
     * Delete user
     * @param integer $id
     * @return bool
     */
    public function delete(integer $id)
    {
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