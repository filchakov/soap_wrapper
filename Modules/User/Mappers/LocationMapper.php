<?php

namespace Modules\User\Mappers;

use Modules\User\Models\Location;
use Modules\User\Models\LocationNullObject;

use Modules\LibraryModule\Entity\EntityMapper;

class LocationMapper extends EntityMapper
{
    const URL = 'users/getLocation';

    public function __construct(){
        parent::__construct(self::URL);
    }

    /**
     * @param array $objectData
     * @return Location|LocationNullObject
     */
    public function buildObject(array $objectData)
    {
        if(!count($objectData)){
            return new \Modules\User\Models\LocationNullObject();
        }

        return new \Modules\User\Models\Location(
            $objectData[\Modules\User\Models\Location::LONGITUDE],
            $objectData[\Modules\User\Models\Location::LATITUDE]
        );
    }
}