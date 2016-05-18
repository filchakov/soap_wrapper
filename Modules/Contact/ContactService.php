<?php

namespace Modules\Contact;

use Exception;
use Modules\Contact\Mappers\ContactMapper;
use Modules\Contact\Models\Contact;
use Modules\Contact\Models\ContactCollection;
use Modules\Contact\Models\ContactNullObject;
use Modules\LibreryModule\Collection;
use SoapFault;

class ContactService extends \Modules\LibreryModule\AbstractService
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
     * @return \Modules\Contact\Models\ContactCollection
     */
    public function show()
    {
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
     * @return \Modules\Contact\Models\Contact
     */
    public function get(integer $id)
    {
         return $this->getMapper()->get($id);
    }

    /**
     * Insert new contact
     * @param string $firstName
     * @param string $lastName
     * @param string $phoneNumber
     * @param string $email
     * @return \Modules\Contact\Models\Contact
     */
    public function insert(string $firstName, string $lastName, string $phoneNumber, string $email)
    {
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
     * @return \Modules\Contact\Models\Contact
     */
    public function update(integer $id, string $firstName, string $lastName, string $phoneNumber, string $email)
    {
        $contact = new Contact($id, $firstName, $lastName, $phoneNumber, $email);
        return $this->getMapper()->update($id, $contact->toArray());
    }

    /**
     * Delete contact
     * @param integer $id
     * @return bool
     */
    public function delete(integer $id)
    {
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