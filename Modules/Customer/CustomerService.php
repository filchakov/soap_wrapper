<?php

namespace Modules\Customer;


use Modules\Customer\Mappers\CustomerAdressMapper;

use Modules\Customer\Models\CustomerAdressCollection;

class CustomerService
{

    private $mapper = null;

    /**
     * CustomerService constructor.
     */
    public function __construct()
    {
        $this->setMapper(new CustomerAdressMapper());
    }

    /**
     * Show all customers
     * @return \Modules\Customer\Models\CustomerAdressCollection
     */
    public function show()
    {
        $result = $this->getMapper()->show();

        $collection = new CustomerAdressCollection();

        foreach ($result as $key => $item) {
            $collection->addItem($this->getMapper()->buildObject($item), $key);
        }

        return $collection;
    }



    /**
     * Show a single customer
     * @param integer $id
     * @return \Modules\Customer\Models\CustomerAdress
     */
    public function get(integer $id)
    {
        $request = $this->getMapper()->get($id);
        //$customer = new Customer();
        //$result = new CustomerAdress($customer);
        return $request;
    }

    /**
     * Insert new customer
     * @param string $name
     * @param integer $shippingID
     * @param integer $billingID
     * @param integer $mainContactID
     * @return \Modules\Customer\Models\CustomerAdress
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
     * @return CustomerAdressMapper
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