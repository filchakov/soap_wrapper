<?php

namespace Modules\Contact;

use Modules\Contact\Mappers\ContactMapper;
use Modules\Contact\Models\Contact;
use Modules\Contact\Models\ContactCollection;

class ContactService extends \Modules\LibraryModule\AbstractService
{

    private $mapper = null;

    /**
     * ContactService constructor.
     */
    public function __construct()
    {
        $this->setMapper(new ContactMapper());
    }

    /**
     * Show all contacts
     * @param string $accessToken
     * @return \Modules\Contact\Models\ContactCollection
     */
    public function show($accessToken = '')
    {
        $this->getMapper()->setAccessToken($accessToken);

        $result = $this->getMapper()->show();

        $collection = new ContactCollection();
        foreach ($result as $key => $item) {
            $collection->addItem($this->getMapper()->buildObject($item), $key);
        }

        return $collection;
    }

    /**
     * Show a single contact
     * @param integer $id
     * @param string $accessToken
     * @return \Modules\Contact\Models\Contact
     */
    public function get($id = 0, $accessToken = '')
    {
        $this->getMapper()->setAccessToken($accessToken);
        return $this->getMapper()->get($id);
    }

    /**
     * Insert new contact
     * @param string $firstName
     * @param string $lastName
     * @param string $phoneNumber
     * @param string $email
     * @param string $accessToken
     * @return \Modules\Contact\Models\Contact
     */
    public function insert($firstName = '', $lastName = '', $phoneNumber = '', $email = '', $accessToken = '')
    {
        $this->getMapper()->setAccessToken($accessToken);

        $contact = new Contact(0, $firstName, $lastName, $phoneNumber, $email);
        return $this->getMapper()->insert($contact->toArray());
    }

    /**
     * Update single contact
     * @param integer $id
     * @param string $firstName
     * @param string $lastName
     * @param string $phoneNumber
     * @param string $email
     * @param string $accessToken
     * @return \Modules\Contact\Models\Contact
     */
    public function update($id = 0, $firstName = '', $lastName = '', $phoneNumber = '', $email = '', $accessToken = '')
    {
        $this->getMapper()->setAccessToken($accessToken);
        $contact = new Contact($id, $firstName, $lastName, $phoneNumber, $email);
        return $this->getMapper()->update($id, $contact->toArray());
    }

    /**
     * Delete contact
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
     * @return ContactMapper
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