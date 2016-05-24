<?php

namespace Modules\User\Models;


use Exception;

class UserCollection
{

    /**
     * @var \Modules\User\Models\User[]
     */
    public $user = null;

    public function addItem($obj, $key = null) {
        if ($key == null) {
            $this->user[] = $obj;
        }
        else {
            if (isset($this->user[$key])) {
                throw new Exception("Key $key already in use.");
            }
            else {
                $this->user[$key] = $obj;
            }
        }
    }

    public function deleteItem($key) {
        if (isset($this->user[$key])) {
            unset($this->user[$key]);
        }
        else {
            throw new Exception("Invalid key $key.");
        }
    }

    public function getItem($key) {
        if (isset($this->user[$key])) {
            return $this->user[$key];
        }
        else {
            throw new Exception("Invalid key $key.");
        }
    }

    public function get(){
        return $this->user;
    }
}