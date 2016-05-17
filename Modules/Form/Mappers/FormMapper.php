<?php

namespace Modules\Form\Mappers;

use Modules\Contact\Models\Contact;
use Modules\Contact\Models\ContactNullObject;
use Modules\Entity\EntityMapper;

class FormMapper extends EntityMapper
{
    const URL = 'forms';

    public function __construct(){
        parent::__construct(self::URL);
    }

    /**
     * @param array $objectData
     * @return Contact|ContactNullObject
     */
    public function buildObject(array $objectData)
    {
        var_dump($objectData);die;
        if(!count($objectData)){
            return new \Modules\Contact\Models\ContactNullObject();
        }

        return new \Modules\Contact\Models\Contact(
            $objectData[\Modules\Contact\Models\Contact::ID],
            $objectData[\Modules\Contact\Models\Contact::FIRST_NAME],
            $objectData[\Modules\Contact\Models\Contact::LAST_NAME],
            $objectData[\Modules\Contact\Models\Contact::PHONE_NUMBER],
            $objectData[\Modules\Contact\Models\Contact::EMAIL]
        );
    }
}