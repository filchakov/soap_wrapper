<?php

namespace Modules\Customer\Models\Adress;


class BillingNullObject extends Billing
{
    public function __construct()
    {
        parent::__construct(0, '', '', '', '', '', '', 0.0, 0.0);
    }

    public function toArray()
    {
        return [];
    }

}