<?php

namespace Modules\WorkOrder\Models;


use Modules\Customer\Models\CustomerNullObject;

class WorkOrderNullObject extends WorkOrder
{
    public function __construct(){
        parent::__construct(0, '', new CustomerNullObject(), new ScheduleNullObject(), 0, '', '', '', 0, 0, '');
    }

    public function toArray(){
        return [];
    }
}