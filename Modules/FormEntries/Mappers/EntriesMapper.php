<?php

namespace Modules\FormEntries\Mappers;

use Modules\LibraryModule\Entity\EntityMapper;
use Modules\FormEntries\Models\Entries;
use Modules\FormEntries\Models\EntriesNullObject;

class EntriesMapper extends EntityMapper
{

    /**
     * @param array $objectData
     * @return Entries|EntriesNullObject
     */
    public function buildObject(array $objectData)
    {

        if(!count($objectData)){
            return new EntriesNullObject();
        }

        return new Entries(
            $objectData[FormEntries::KEY],
            $objectData[FormEntries::VALUE]
        );
    }
}