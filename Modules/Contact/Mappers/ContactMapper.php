<?php

namespace Modules\Contact\Mappers;

use Modules\Contact\Models\Contact;
use Modules\Contact\Models\ContactNullObject;
use Modules\LibraryModule\Entity\EntityMapper;

class ContactMapper extends EntityMapper
{
    const URL = 'contacts';

    public function __construct(){
        parent::__construct(self::URL);
    }

    /**
     * @param array $objectData
     * @return Contact|ContactNullObject
     */
    public function buildObject(array $objectData)
    {
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