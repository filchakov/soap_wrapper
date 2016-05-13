<?php

namespace Modules\Customer\Models;


class CustomerNullObject extends Customer
{
    public function __construct()
    {
        parent::__construct(0, '', 0, 0, 0);
    }

    public function toArray()
    {
        return [];
    }

}