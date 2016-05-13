<?php

namespace Modules\Customer\Models;

use Modules\Contact\Models\ContactNullObject;
use Modules\Customer\Models\Adress\BillingNullObject;
use Modules\Customer\Models\Adress\ShippingNullObject;

class CustomerAdressNullObject extends CustomerAdress
{

    public function __construct()
    {
        parent::__construct(new CustomerNullObject(), new ShippingNullObject(), new BillingNullObject(), new ContactNullObject());
    }

    public function toArray()
    {
        return [];
    }
}