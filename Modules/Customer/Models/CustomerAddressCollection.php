<?php

namespace Modules\Customer\Models;

use Exception;

class CustomerAddressCollection
{
    /**
     * @var \Modules\Customer\Models\CustomerAddress[]
     */
    public $customerAddress = null;

    public function addItem($obj, $key = null) {
        if ($key == null) {
            $this->customerAddress[] = $obj;
        }
        else {
            if (isset($this->customerAddress[$key])) {
                throw new Exception("Key $key already in use.");
            }
            else {
                $this->customerAddress[$key] = $obj;
            }
        }
    }

    public function deleteItem($key) {
        if (isset($this->customerAddress[$key])) {
            unset($this->customerAddress[$key]);
        }
        else {
            throw new Exception("Invalid key $key.");
        }
    }

    public function getItem($key) {
        if (isset($this->customerAddress[$key])) {
            return $this->customerAddress[$key];
        }
        else {
            throw new Exception("Invalid key $key.");
        }
    }

    public function get(){
        return $this->customerAddress;
    }

}