<?php

namespace Modules\Location\Models;

class LocationNullObject extends Location
{

    public function __construct()
    {
        parent::__construct(0, '', '', '', '', '', '', 0.0, 0.0);
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [];
    }

}