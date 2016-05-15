<?php

namespace Modules\WorkOrder\Models;


use Exception;
use Modules\WorkOrder\Models\WorkOrderFull;

class WorkOrderFullCollection
{
    /**
     * @var \Modules\WorkOrder\Models\WorkOrderFull[]
     */
    public $workOrderFull = null;

    public function addItem($obj, $key = null) {
        if ($key == null) {
            $this->workOrderFull[] = $obj;
        }
        else {
            if (isset($this->workOrderFull[$key])) {
                throw new Exception("Key $key already in use.");
            }
            else {
                $this->workOrderFull[$key] = $obj;
            }
        }
    }

    public function deleteItem($key) {
        if (isset($this->workOrderFull[$key])) {
            unset($this->workOrderFull[$key]);
        }
        else {
            throw new Exception("Invalid key $key.");
        }
    }

    public function getItem($key) {
        if (isset($this->workOrderFull[$key])) {
            return $this->workOrderFull[$key];
        }
        else {
            throw new Exception("Invalid key $key.");
        }
    }

    public function get(){
        return $this->workOrderFull;
    }
}