<?php

namespace Modules\Location\Mappers;

use Modules\Location\Models\Location;
use Modules\Location\Models\LocationNullObject;
use Modules\Entity\EntityMapper;

class LocationMapper extends EntityMapper
{
    const URL = 'locations';

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
            return new \Modules\Location\Models\LocationNullObject();
        }

        return new \Modules\Location\Models\Location(
            $objectData[\Modules\Location\Models\Location::ID],
            $objectData[\Modules\Location\Models\Location::ADDRESS],
            $objectData[\Modules\Location\Models\Location::ADDRESS2],
            $objectData[\Modules\Location\Models\Location::CITY],
            $objectData[\Modules\Location\Models\Location::STATE],
            $objectData[\Modules\Location\Models\Location::ZIP_CODE],
            $objectData[\Modules\Location\Models\Location::COUNTRY],
            $objectData[\Modules\Location\Models\Location::LONGITUDE],
            $objectData[\Modules\Location\Models\Location::LATITUDE]
        );
    }
}