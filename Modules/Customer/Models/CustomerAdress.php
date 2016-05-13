<?php

namespace Modules\Customer\Models;


use Modules\Contact\Models\Contact;
use Modules\Customer\Models\Adress\Billing;
use Modules\Customer\Models\Adress\Shipping;
use Modules\LibreryModule\ArraySerializable;

class CustomerAdress implements ArraySerializable
{

    const ID = 'id';
    const NAME = 'name';

    const SHIPPING = 'shipping';

    const BILLING = 'billing';

    const CONTACSTS = 'contacts';

    /**
     * @var int
     */
    public $id = 0;

    /**
     * @var string
     */
    public $name = '';

    /**
     * @var \Modules\Customer\Models\Adress\Shipping
     */
    public $shipping = null;

    /**
     * @var \Modules\Customer\Models\Adress\Billing
     */
    public $billing = null;

    /**
     * @var \Modules\Contact\Models\Contact
     */
    public $contacts = null;

    /**
     * CustomerAdress constructor.
     * @param int $id
     * @param string $name
     * @param int $shippingID
     * @param int $billingID
     * @param int $mainContactID
     */
    public function __construct(Customer $customer, Shipping $shipping, Billing $billing, Contact $contact)
    {
        $this
            ->setId($customer->getId())
            ->setName($customer->getName())
            ->setShipping($shipping)
            ->setBilling($billing)
            ->setContacts($contact);
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return Shipping
     */
    public function getShipping()
    {
        return $this->shipping;
    }

    /**
     * @param Shipping $shipping
     * @return $this
     */
    public function setShipping($shipping)
    {
        $this->shipping = $shipping;
        return $this;
    }

    /**
     * @return Billing
     */
    public function getBilling()
    {
        return $this->billing;
    }

    /**
     * @param Billing $billing
     * @return $this
     */
    public function setBilling($billing)
    {
        $this->billing = $billing;
        return $this;
    }

    /**
     * @return Contact
     */
    public function getContacts()
    {
        return $this->contacts;
    }

    /**
     * @param Contact $contacts
     * @return $this
     */
    public function setContacts($contacts)
    {
        $this->contacts = $contacts;
        return $this;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            self::ID => $this->getId(),
            self::NAME => $this->getName(),
            self::SHIPPING => $this->getShipping()->toArray(),
            self::BILLING => $this->getBilling()->toArray(),
            self::CONTACSTS => $this->getContacts()->toArray(),
        ];
    }
}