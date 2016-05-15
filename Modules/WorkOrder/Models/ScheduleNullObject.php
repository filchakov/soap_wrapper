<?php

namespace Modules\WorkOrder\Models;

class ScheduleNullObject extends Schedule
{

    public function __construct(){
        parent::__construct('', 0, 0);
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [];
    }
}