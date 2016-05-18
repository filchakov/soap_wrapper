<?php

namespace Modules\Customer;


use Modules\Customer\Mappers\CustomerAddressMapper;

use Modules\Customer\Models\CustomerAddressCollection;

class CustomerService extends \Modules\LibraryModule\AbstractService
{

    private $mapper = null;

    /**
     * CustomerService constructor.
     */
    public function __construct()
    {
        $this->setMapper(new CustomerAddressMapper());
    }

    /**
     * Show all customers
     * @return \Modules\Customer\Models\CustomerAddressCollection
     */
    public function show()
    {
        $result = $this->getMapper()->show();

        $collection = new CustomerAddressCollection();

        foreach ($result as $key => $item) {
            $collection->addItem($this->getMapper()->buildObject($item), $key);
        }

        return $collection;
    }



    /**
     * Show a single customer
     * @param integer $id
     * @return \Modules\Customer\Models\CustomerAddress
     */
    public function get(integer $id)
    {
        $request = $this->getMapper()->get($id);
        //$customer = new Customer();
        //$result = new CustomerAddress($customer);
        return $request;
    }

    /**
     * Insert new customer
     * @param string $name
     * @param integer $shippingID
     * @param integer $billingID
     * @param integer $mainContactID
     * @return \Modules\Customer\Models\CustomerAddress
     */
    public function insert(string $name, integer $shippingID, integer $billingID, integer $mainContactID)
    {
        return $this->getMapper()->insert(compact('name', 'shippingID', 'billingID', 'mainContactID'));
    }

    /**
     * Update single customer
     * @param integer $id
     * @param string $name
     * @param integer $shippingID
     * @param integer $billingID
     * @param integer $mainContactID
     * @return \Modules\Contact\Models\Contact
     */
    public function update(integer $id, string $name, integer $shippingID, integer $billingID, integer $mainContactID)
    {
        return $this->getMapper()->update($id, compact('name', 'shippingID', 'billingID', 'mainContactID'));
    }

    /**
     * Delete customer
     * @param integer $id
     * @return bool
     */
    public function delete(integer $id)
    {
        return $this->getMapper()->delete($id);
    }

    /**
     * @return CustomerAddressMapper
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