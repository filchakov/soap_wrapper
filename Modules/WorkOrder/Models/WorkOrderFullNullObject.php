<?php

namespace Modules\WorkOrder\Models;

use Modules\Customer\Models\CustomerAdressNullObject;

class WorkOrderFullNullObject extends WorkOrderFull
{
    public function __construct(){
        parent::__construct(
            0, [], new CustomerAdressNullObject(), new ScheduleNullObject(), 0,
            new TemplateNullObject(), null, 0, 0, new FormNullObject(), null,
            '', null, null, '', '', '', null, 0, 0, 0
        );
    }

    public function toArray(){
        return [];
    }
}