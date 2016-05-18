<?php

namespace Modules\Customer\Mappers;

use Modules\Contact\Models\Contact;
use Modules\Customer\Models\Address\Billing;
use Modules\Customer\Models\Address\Shipping;
use Modules\Customer\Models\Customer;
use Modules\Customer\Models\CustomerAddress;
use Modules\LibraryModule\Entity\EntityMapper;

class CustomerAddressMapper extends EntityMapper
{
    const URL = 'customers';

    public function __construct(){
        parent::__construct(self::URL);
    }

    /**
     * @param array $objectData
     * @return mixed
     */
    public function buildObject(array $objectData)
    {
        if(!count($objectData)){
            return new \Modules\Customer\Models\CustomerAddressNullObject();
        }

        $customer = new Customer(
            $objectData[\Modules\Customer\Models\Customer::ID],
            $objectData[\Modules\Customer\Models\Customer::NAME]
        );

        $shipping = new Shipping(
            $objectData[CustomerAddress::SHIPPING][Shipping::ID],
            $objectData[CustomerAddress::SHIPPING][Shipping::ADDRESS],
            $objectData[CustomerAddress::SHIPPING][Shipping::ADDRESS2],
            $objectData[CustomerAddress::SHIPPING][Shipping::CITY],
            $objectData[CustomerAddress::SHIPPING][Shipping::STATE],
            $objectData[CustomerAddress::SHIPPING][Shipping::ZIP_CODE],
            $objectData[CustomerAddress::SHIPPING][Shipping::COUNTRY],
            $objectData[CustomerAddress::SHIPPING][Shipping::LONGITUDE],
            $objectData[CustomerAddress::SHIPPING][Shipping::LATITUDE]
        );

        $billing = new Billing(
            $objectData[CustomerAddress::BILLING][Billing::ID],
            $objectData[CustomerAddress::BILLING][Billing::ADDRESS],
            $objectData[CustomerAddress::BILLING][Billing::ADDRESS2],
            $objectData[CustomerAddress::BILLING][Billing::CITY],
            $objectData[CustomerAddress::BILLING][Billing::STATE],
            $objectData[CustomerAddress::BILLING][Billing::ZIP_CODE],
            $objectData[CustomerAddress::BILLING][Billing::COUNTRY],
            $objectData[CustomerAddress::BILLING][Billing::LONGITUDE],
            $objectData[CustomerAddress::BILLING][Billing::LATITUDE]
        );

        $contact = new Contact(
            $objectData[CustomerAddress::CONTACTS][0][Contact::ID],
            $objectData[CustomerAddress::CONTACTS][0][Contact::FIRST_NAME],
            $objectData[CustomerAddress::CONTACTS][0][Contact::LAST_NAME],
            $objectData[CustomerAddress::CONTACTS][0][Contact::PHONE_NUMBER],
            $objectData[CustomerAddress::CONTACTS][0][Contact::EMAIL]
        );

        return new \Modules\Customer\Models\CustomerAddress(
            $customer,
            $shipping,
            $billing,
            $contact
        );
    }
}