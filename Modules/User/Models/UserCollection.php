<?php

namespace Modules\User\Models;


use Exception;

class UserCollection
{

    /**
     * @var \Modules\User\Models\User[]
     */
    public $User = null;

    public function addItem($obj, $key = null) {
        if ($key == null) {
            $this->User[] = $obj;
        }
        else {
            if (isset($this->User[$key])) {
                throw new Exception("Key $key already in use.");
            }
            else {
                $this->User[$key] = $obj;
            }
        }
    }

    public function deleteItem($key) {
        if (isset($this->User[$key])) {
            unset($this->User[$key]);
        }
        else {
            throw new Exception("Invalid key $key.");
        }
    }

    public function getItem($key) {
        if (isset($this->User[$key])) {
            return $this->User[$key];
        }
        else {
            throw new Exception("Invalid key $key.");
        }
    }

    public function get(){
        return $this->User;
    }
}