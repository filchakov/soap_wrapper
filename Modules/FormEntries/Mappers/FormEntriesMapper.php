<?php

namespace Modules\FormEntries\Mappers;

use Modules\LibreryModule\Entity\EntityMapper;
use Modules\FormEntries\Models\FormEntries;
use Modules\FormEntries\Models\FormEntriesNullObject;

class FormEntriesMapper extends EntityMapper
{
    const URL = 'form-entries';

    public function __construct(){
        parent::__construct(self::URL);
    }

    /**
     * @param array $objectData
     * @return FormEntries|FormEntriesNullObject
     */
    public function buildObject(array $objectData)
    {

        if(!count($objectData)){
            return new FormEntriesNullObject();
        }

        return new FormEntries(
            $objectData[FormEntries::ID],
            $objectData[FormEntries::FORM_ID],
            $objectData[FormEntries::ENTRY]
        );
    }
}