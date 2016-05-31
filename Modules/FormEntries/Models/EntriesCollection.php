<?php

namespace Modules\FormEntries\Models;

use Exception;

class EntriesCollection
{
    /**
     * @var \Modules\FormEntries\Models\Entries[]
     */
    public $formEntry = null;

    public function addItem($obj, $key = null) {
        if ($key == null) {
            $this->formEntry[] = $obj;
        }
        else {
            if (isset($this->formEntry[$key])) {
                throw new Exception("Key $key already in use.");
            }
            else {
                $this->formEntry[$key] = $obj;
            }
        }
    }

    public function deleteItem($key) {
        if (isset($this->formEntry[$key])) {
            unset($this->formEntry[$key]);
        }
        else {
            throw new Exception("Invalid key $key.");
        }
    }

    public function getItem($key) {
        if (isset($this->formEntry[$key])) {
            return $this->formEntry[$key];
        }
        else {
            throw new Exception("Invalid key $key.");
        }
    }

    public function get(){
        return $this->formEntry;
    }
}