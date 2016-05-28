<?php

namespace Modules\Contact\Models;

class ContactNullObject extends Contact
{

    public function __construct()
    {
        parent::__construct(0, '','','','', '', '');
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [];
    }

}