<?php

namespace Modules\WorkOrder\Models;


use Exception;

class WorkOrderCollection
{
    /**
     * @var \Modules\WorkOrder\Models\WorkOrder[]
     */
    public $workOrder = null;

    public function addItem($obj, $key = null) {
        if ($key == null) {
            $this->workOrder[] = $obj;
        }
        else {
            if (isset($this->workOrder[$key])) {
                throw new Exception("Key $key already in use.");
            }
            else {
                $this->workOrder[$key] = $obj;
            }
        }
    }

    public function deleteItem($key) {
        if (isset($this->workOrder[$key])) {
            unset($this->workOrder[$key]);
        }
        else {
            throw new Exception("Invalid key $key.");
        }
    }

    public function getItem($key) {
        if (isset($this->workOrder[$key])) {
            return $this->workOrder[$key];
        }
        else {
            throw new Exception("Invalid key $key.");
        }
    }

    public function get(){
        return $this->workOrder;
    }
}