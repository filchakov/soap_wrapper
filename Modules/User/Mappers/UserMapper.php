<?php

namespace Modules\User\Mappers;

use Modules\User\Models\User;
use Modules\User\Models\UserNullObject;
use Modules\LibraryModule\Entity\EntityMapper;

class UserMapper extends EntityMapper
{
    const URL = 'users';

    public function __construct(){
        parent::__construct(self::URL);
    }

    /**
     * @param array $objectData
     * @return User|UserNullObject
     */
    public function buildObject(array $objectData)
    {
        if(!count($objectData)){
            return new \Modules\User\Models\UserNullObject();
        }

        return new \Modules\User\Models\User(
            $objectData[\Modules\User\Models\User::ID],
            $objectData[\Modules\User\Models\User::FIRST_NAME],
            $objectData[\Modules\User\Models\User::LAST_NAME],
            $objectData[\Modules\User\Models\User::USERNAME],
            $objectData[\Modules\User\Models\User::EMAIL],
            $objectData[\Modules\User\Models\User::DISABLED],
            $objectData[\Modules\User\Models\User::IS_DRIVER]
        );
    }
}