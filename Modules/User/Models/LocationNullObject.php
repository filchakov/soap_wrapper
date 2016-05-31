<?php

namespace Modules\User\Models;

class LocationNullObject extends Location
{

    public function __construct(){
        return parent::__construct(0.0, 0.0);
    }

    public function toArray(){
        return [];
    }
}