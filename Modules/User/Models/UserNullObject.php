<?php

namespace Modules\User\Models;

class UserNullObject extends User
{

    public function __construct()
    {
        parent::__construct(0, '', '', '', '', '', '');
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [];
    }

}