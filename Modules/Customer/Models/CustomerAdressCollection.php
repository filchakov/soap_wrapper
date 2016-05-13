<?php

namespace Modules\Customer\Models;

use Exception;

class CustomerAdressCollection
{
    /**
     * @var \Modules\Customer\Models\CustomerAdress[]
     */
    public $customerAdress = null;

    public function addItem($obj, $key = null) {
        if ($key == null) {
            $this->customerAdress[] = $obj;
        }
        else {
            if (isset($this->customerAdress[$key])) {
                throw new Exception("Key $key already in use.");
            }
            else {
                $this->customerAdress[$key] = $obj;
            }
        }
    }

    public function deleteItem($key) {
        if (isset($this->customerAdress[$key])) {
            unset($this->customerAdress[$key]);
        }
        else {
            throw new Exception("Invalid key $key.");
        }
    }

    public function getItem($key) {
        if (isset($this->customerAdress[$key])) {
            return $this->customerAdress[$key];
        }
        else {
            throw new Exception("Invalid key $key.");
        }
    }

    public function get(){
        return $this->customerAdress;
    }

}