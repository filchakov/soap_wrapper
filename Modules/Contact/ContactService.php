<?php

namespace Modules\Contact;

use Modules\Contact\Mappers\ContactMapperAPI;
use Modules\LibreryModule\Collection;

class ContactService
{

    private $mapper = null;

    /**
     * ContactService constructor.
     * @param null $client
     */
    public function __construct()
    {
        $this->setMapper(new ContactMapperAPI());
    }

    /**
     * Show all contacts
     * @return array|Collection
     */
    public function show(){
        $result = $this->getMapper()->show();

        $collection = new Collection();
        foreach($result as $key => $item){
            $collection->addItem($this->getMapper()->buildObject($item), $key);
        }

        return $collection->get();
    }

    /**
     * Show a single contact
     * @param integer $id
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function get(integer $id){
        return $this->getMapper()->get($id);
    }

    /**
     * Insert new contact
     * @param string $firstName
     * @param string $lastName
     * @param string $phoneNumber
     * @param string $email
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function insert(string $firstName, string $lastName, string $phoneNumber, string $email){
        return $this->getMapper()->insert(compact('firstName', 'lastName', 'phoneNumber', 'email'));
    }

    /**
     * Update single contact
     * @param integer $id
     * @param string $firstName
     * @param string $lastName
     * @param string $phoneNumber
     * @param string $email
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function update(integer $id, string $firstName, string $lastName, string $phoneNumber, string $email){
        return $this->getMapper()->update($id, compact('firstName', 'lastName', 'phoneNumber', 'email'));
    }

    /**
     * Delete contact
     * @param integer $id
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function delete(integer $id){
        return $this->getMapper()->delete($id);
    }


    /**
     * @return ContactMapperAPI
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