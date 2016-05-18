<?php

namespace Modules\Customer\Mappers;

use Modules\Contact\Models\Contact;
use Modules\Customer\Models\Adress\Billing;
use Modules\Customer\Models\Adress\Shipping;
use Modules\Customer\Models\Customer;
use Modules\Customer\Models\CustomerAdress;
use Modules\LibreryModule\Entity\EntityMapper;

class CustomerAdressMapper extends EntityMapper
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
            return new \Modules\Customer\Models\CustomerAdressNullObject();
        }

        $customer = new Customer(
            $objectData[\Modules\Customer\Models\Customer::ID],
            $objectData[\Modules\Customer\Models\Customer::NAME]
        );

        $shipping = new Shipping(
            $objectData[CustomerAdress::SHIPPING][Shipping::ID],
            $objectData[CustomerAdress::SHIPPING][Shipping::ADDRESS],
            $objectData[CustomerAdress::SHIPPING][Shipping::ADDRESS2],
            $objectData[CustomerAdress::SHIPPING][Shipping::CITY],
            $objectData[CustomerAdress::SHIPPING][Shipping::STATE],
            $objectData[CustomerAdress::SHIPPING][Shipping::ZIP_CODE],
            $objectData[CustomerAdress::SHIPPING][Shipping::COUNTRY],
            $objectData[CustomerAdress::SHIPPING][Shipping::LONGITUDE],
            $objectData[CustomerAdress::SHIPPING][Shipping::LATITUDE]
        );

        $billing = new Billing(
            $objectData[CustomerAdress::BILLING][Billing::ID],
            $objectData[CustomerAdress::BILLING][Billing::ADDRESS],
            $objectData[CustomerAdress::BILLING][Billing::ADDRESS2],
            $objectData[CustomerAdress::BILLING][Billing::CITY],
            $objectData[CustomerAdress::BILLING][Billing::STATE],
            $objectData[CustomerAdress::BILLING][Billing::ZIP_CODE],
            $objectData[CustomerAdress::BILLING][Billing::COUNTRY],
            $objectData[CustomerAdress::BILLING][Billing::LONGITUDE],
            $objectData[CustomerAdress::BILLING][Billing::LATITUDE]
        );

        $contact = new Contact(
            $objectData[CustomerAdress::CONTACSTS][0][Contact::ID],
            $objectData[CustomerAdress::CONTACSTS][0][Contact::FIRST_NAME],
            $objectData[CustomerAdress::CONTACSTS][0][Contact::LAST_NAME],
            $objectData[CustomerAdress::CONTACSTS][0][Contact::PHONE_NUMBER],
            $objectData[CustomerAdress::CONTACSTS][0][Contact::EMAIL]
        );

        return new \Modules\Customer\Models\CustomerAdress(
            $customer,
            $shipping,
            $billing,
            $contact
        );
    }
}