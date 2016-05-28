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
     * @param string $accessToken
     * @return \Modules\Customer\Models\CustomerAddressCollection
     */
    public function show($accessToken = '')
    {
        $this->getMapper()->setAccessToken($accessToken);

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
     * @param string $accessToken
     * @return \Modules\Customer\Models\CustomerAddress
     */
    public function get($id = 0, $accessToken = '')
    {
        $this->getMapper()->setAccessToken($accessToken);
        return $this->getMapper()->buildObject($this->getMapper()->get($id));
    }

    /**
     * Insert new customer
     * @param string $name
     * @param integer $shippingID
     * @param integer $billingID
     * @param integer $mainContactID
     * @param string $accessToken
     * @return \Modules\Customer\Models\CustomerAddress
     */
    public function insert($name = '', $shippingID = 0, $billingID = 0, $mainContactID = 0, $accessToken = '')
    {
        $this->getMapper()->setAccessToken($accessToken);
        return $this->getMapper()->insert(compact('name', 'shippingID', 'billingID', 'mainContactID'));
    }

    /**
     * Update single customer
     * @param integer $id
     * @param string $name
     * @param integer $shippingID
     * @param integer $billingID
     * @param integer $mainContactID
     * @param string $accessToken
     * @return \Modules\Contact\Models\Contact
     */
    public function update($id = 0, $name = '', $shippingID = 0, $billingID = 0, $mainContactID = 0, $accessToken = '')
    {
        $this->getMapper()->setAccessToken($accessToken);
        return $this->getMapper()->update($id, compact('name', 'shippingID', 'billingID', 'mainContactID'));
    }

    /**
     * Delete customer
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