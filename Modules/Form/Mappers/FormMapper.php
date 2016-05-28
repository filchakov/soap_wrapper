<?php

namespace Modules\Form\Mappers;

use Modules\LibraryModule\Entity\EntityMapper;

class FormMapper extends EntityMapper
{
    const URL = 'forms';

    public function __construct(){
        parent::__construct(self::URL);
    }

    public function __encode($t) {
        return json_encode($t);
    }

    /**
     * @param array $objectData
     * @return \Modules\Form\Models\Form|\Modules\Form\Models\FormNullObject
     */
    public function buildObject(array $objectData)
    {

        if(!count($objectData)){
            return new \Modules\Form\Models\FormNullObject();
        }

        return new \Modules\Form\Models\Form(
            $objectData[\Modules\Form\Models\Form::ID],
            $this->__encode($objectData[\Modules\Form\Models\Form::BUILDER]),
            $this->__encode($objectData[\Modules\Form\Models\Form::SCHEMA]),
            $this->__encode($objectData[\Modules\Form\Models\Form::LAYOUT]),
            $objectData[\Modules\Form\Models\Form::DRIVE_STATUS]
        );
    }
}