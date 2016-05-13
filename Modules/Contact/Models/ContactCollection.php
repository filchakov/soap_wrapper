<?php

namespace Modules\Contact\Models;


use Exception;

class ContactCollection
{

    /**
     * @var \Modules\Contact\Models\Contact[]
     */
    public $contact = null;

    public function addItem($obj, $key = null) {
        if ($key == null) {
            $this->contact[] = $obj;
        }
        else {
            if (isset($this->contact[$key])) {
                throw new Exception("Key $key already in use.");
            }
            else {
                $this->contact[$key] = $obj;
            }
        }
    }

    public function deleteItem($key) {
        if (isset($this->contact[$key])) {
            unset($this->contact[$key]);
        }
        else {
            throw new Exception("Invalid key $key.");
        }
    }

    public function getItem($key) {
        if (isset($this->contact[$key])) {
            return $this->contact[$key];
        }
        else {
            throw new Exception("Invalid key $key.");
        }
    }

    public function get(){
        return $this->contact;
    }
}