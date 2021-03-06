<?php

namespace Modules\FormEntries\Models;

use Exception;

class FormEntriesCollection
{
    /**
     * @var \Modules\FormEntries\Models\FormEntries[]
     */
    public $form = null;

    public function addItem($obj, $key = null) {
        if ($key == null) {
            $this->form[] = $obj;
        }
        else {
            if (isset($this->form[$key])) {
                throw new Exception("Key $key already in use.");
            }
            else {
                $this->form[$key] = $obj;
            }
        }
    }

    public function deleteItem($key) {
        if (isset($this->form[$key])) {
            unset($this->form[$key]);
        }
        else {
            throw new Exception("Invalid key $key.");
        }
    }

    public function getItem($key) {
        if (isset($this->form[$key])) {
            return $this->form[$key];
        }
        else {
            throw new Exception("Invalid key $key.");
        }
    }

    public function get(){
        return $this->form;
    }
}