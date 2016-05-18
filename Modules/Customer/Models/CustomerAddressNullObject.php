<?php

namespace Modules\Customer\Models;

use Modules\Contact\Models\ContactNullObject;
use Modules\Customer\Models\Address\BillingNullObject;
use Modules\Customer\Models\Address\ShippingNullObject;

class CustomerAddressNullObject extends CustomerAddress
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