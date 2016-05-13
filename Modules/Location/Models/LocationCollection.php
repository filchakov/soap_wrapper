<?php

namespace Modules\Location\Models;

use Exception;

class LocationCollection
{
    /**
     * @var \Modules\Location\Models\Location[]
     */
    public $location = null;

    public function addItem($obj, $key = null) {
        if ($key == null) {
            $this->location[] = $obj;
        }
        else {
            if (isset($this->location[$key])) {
                throw new Exception("Key $key already in use.");
            }
            else {
                $this->location[$key] = $obj;
            }
        }
    }

    public function deleteItem($key) {
        if (isset($this->location[$key])) {
            unset($this->location[$key]);
        }
        else {
            throw new Exception("Invalid key $key.");
        }
    }

    public function getItem($key) {
        if (isset($this->location[$key])) {
            return $this->location[$key];
        }
        else {
            throw new Exception("Invalid key $key.");
        }
    }

    public function get(){
        return $this->location;
    }
}