<?php

namespace Modules\WorkOrder\Models;

use Modules\Customer\Models\CustomerAdress;
use Modules\LibreryModule\ArraySerializable;

class WorkOrderFull implements ArraySerializable
{

    const ID = 'id';
    const GROUPS = 'groups';
    const CUSTOMER = 'customer';
    const SCHEDULE = 'schedule';
    const TEMPLATE_ID = 'templateId';
    const TEMPLATE = 'template';
    const TEMPLATE_ENTRIES = 'templateEntries';
    const FORM_ID = 'formId';
    const FORM_ENTRY_ID = 'formEntryId';
    const FORM = 'form';
    const FORM_ENTRY = 'formEntry';
    const FORM_NAME = 'formName';
    const PRODUCTS = 'products';
    const ROUTE_ID = 'routeId';
    const NAME = 'name';
    const COMMENTS = 'comments';
    const STATUS = 'status';
    const DELIVERED = 'delivered';
    const DURATION = 'duration';
    const DRIVER_ID = 'driverId';
    const FORM_ENTRIES = 'formEntries';
    const COMPLETED_ON = 'completedOn';
    const EXCEPTED_ARRIVAL = 'expectedArrival';

    /**
     * @var int
     */
    public $id = 0;

    /**
     * @var array
     */
    public $groups = [];

    /**
     * @var \Modules\Customer\Models\CustomerAdress
     */
    public $customer = [];

    /**
     * @var \Modules\WorkOrder\Models\Schedule
     */
    public $schedule = [];

    /**
     * @var int
     */
    public $templateId = 0;


    /**
     * @var \Modules\WorkOrder\Models\Template
     */
    public $template = [];


    /**
     * @var array
     */
    public $templateEntries = [];

    /**
     * @var int
     */
    public $formId = 0;

    /**
     * @var int
     */
    public $formEntryId = 0;

    /**
     * @var \Modules\WorkOrder\Models\Form
     */
    public $form = [];

    /**
     * @var array
     */
    public $formEntry = [];

    /**
     * @var string
     */
    public $formName = '';

    /**
     * @var array
     */
    public $products = [];

    /**
     * @var int
     */
    public $routeId = [];

    /**
     * @var string
     */
    public $name = '';

    /**
     * @var string
     */
    public $comments = '';

    /**
     * @var string
     */
    public $status = '';

    /**
     * @var array
     */
    public $delivered = [];

    /**
     * @var int
     */
    public $duration = 0;

    /**
     * @var int
     */
    public $driverId = 0;

    /**
     * @var string
     */
    public $completedOn = '';

    /**
     * @var string
     */
    public $expectedArrival = '';

    /**
     * @var array
     */
    public $formEntries = [];

    /**
     * WorkOrder constructor.
     * @param int $id
     * @param array $groups
     * @param \Modules\Customer\Models\CustomerAdress $customer
     * @param \Modules\WorkOrder\Models\Schedule $schedule
     * @param int $templateId
     * @param \Modules\WorkOrder\Models\Template $template
     * @param array $templateEntries
     * @param int $formId
     * @param int $formEntryId
     * @param Form $form
     * @param array $formEntry
     * @param string $formName
     * @param array $products
     * @param int $routeId
     * @param string $name
     * @param string $comments
     * @param string $status
     * @param array $delivered
     * @param int $duration
     * @param int $driverId
     * @param array $formEntries
     */
    public function __construct($id, array $groups, CustomerAdress $customer, Schedule $schedule, $templateId,
                                Template $template, $templateEntries, $formId, $formEntryId, Form $form, $formEntry,
                                $formName, $products, $routeId, $name, $comments, $status, $delivered, $duration, $driverId, $formEntries,
                                $completedOn, $expectedArrival)
    {
        $this
            ->setId($id)
            ->setGroups($groups)
            ->setCustomer($customer)
            ->setSchedule($schedule)
            ->setTemplateId($templateId)
            ->setTemplate($template)
            ->setTemplateEntries($templateEntries)
            ->setFormId($formId)
            ->setFormEntryId($formEntryId)
            ->setForm($form)
            ->setFormEntry($formEntry)
            ->setFormName($formName)
            ->setProducts($products)
            ->setRouteId($routeId)
            ->setName($name)
            ->setComments($comments)
            ->setStatus($status)
            ->setComments($comments)
            ->setStatus($status)
            ->setDelivered($delivered)
            ->setDuration($duration)
            ->setDriverId($driverId)
            ->setFormEntries($formEntries)
            ->setCompletedOn($completedOn)
            ->setExpectedArrival($expectedArrival);
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
        $this->id = (int)$id;
        return $this;
    }

    /**
     * @return array
     */
    public function getGroups()
    {
        return $this->groups;
    }

    /**
     * @param array $groups
     * @return $this
     */
    public function setGroups($groups)
    {
        $this->groups = $groups;
        return $this;
    }

    /**
     * @return \Modules\Customer\Models\CustomerAdress
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * @param \Modules\Customer\Models\CustomerAdress $customer
     * @return $this
     */
    public function setCustomer($customer)
    {
        $this->customer = $customer;
        return $this;
    }

    /**
     * @return \Modules\WorkOrder\Models\Schedule
     */
    public function getSchedule()
    {
        return $this->schedule;
    }

    /**
     * @param \Modules\WorkOrder\Models\Schedule $schedule
     * @return $this
     */
    public function setSchedule($schedule)
    {
        $this->schedule = $schedule;
        return $this;
    }

    /**
     * @return int
     */
    public function getTemplateId()
    {
        return $this->templateId;
    }

    /**
     * @param int $templateId
     * @return $this
     */
    public function setTemplateId($templateId)
    {
        $this->templateId = $templateId;
        return $this;
    }

    /**
     * @return \Modules\WorkOrder\Models\Template
     */
    public function getTemplate()
    {
        return $this->template;
    }

    /**
     * @param \Modules\WorkOrder\Models\Template $template
     * @return $this
     */
    public function setTemplate($template)
    {
        $this->template = $template;
        return $this;
    }

    /**
     * @return array
     */
    public function getTemplateEntries()
    {
        return $this->templateEntries;
    }

    /**
     * @param array $templateEntries
     * @return $this
     */
    public function setTemplateEntries($templateEntries)
    {
        $this->templateEntries = $templateEntries;
        return $this;
    }

    /**
     * @return int
     */
    public function getFormId()
    {
        return $this->formId;
    }

    /**
     * @param int $formId
     * @return $this
     */
    public function setFormId($formId)
    {
        $this->formId = (int)$formId;
        return $this;
    }

    /**
     * @return int
     */
    public function getFormEntryId()
    {
        return $this->formEntryId;
    }

    /**
     * @param int $formEntryId
     * @return $this
     */
    public function setFormEntryId($formEntryId)
    {
        $this->formEntryId = (int)$formEntryId;
        return $this;
    }

    /**
     * @return Form
     */
    public function getForm()
    {
        return $this->form;
    }

    /**
     * @param Form $form
     * @return $this
     */
    public function setForm($form)
    {
        $this->form = $form;
        return $this;
    }

    /**
     * @return array
     */
    public function getFormEntry()
    {
        return $this->formEntry;
    }

    /**
     * @param array $formEntry
     * @return $this
     */
    public function setFormEntry($formEntry)
    {
        $this->formEntry = $formEntry;
        return $this;
    }

    /**
     * @return string
     */
    public function getFormName()
    {
        return $this->formName;
    }

    /**
     * @param string $formName
     * @return $this
     */
    public function setFormName($formName)
    {
        $this->formName = $formName;
        return $this;
    }

    /**
     * @return array
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * @param array $products
     * @return $this
     */
    public function setProducts($products)
    {
        $this->products = $products;
        return $this;
    }

    /**
     * @return array
     */
    public function getRouteId()
    {
        return $this->routeId;
    }

    /**
     * @param int $routeId
     * @return $this
     */
    public function setRouteId($routeId)
    {
        $this->routeId = (int)$routeId;
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
     * @return string
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * @param string $comments
     * @return $this
     */
    public function setComments($comments)
    {
        $this->comments = $comments;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return array
     */
    public function getDelivered()
    {
        return $this->delivered;
    }

    /**
     * @param array $delivered
     * @return $this
     */
    public function setDelivered($delivered)
    {
        $this->delivered = $delivered;
        return $this;
    }

    /**
     * @return int
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * @param int $duration
     * @return $this
     */
    public function setDuration($duration)
    {
        $this->duration = (int)$duration;
        return $this;
    }

    /**
     * @return int
     */
    public function getDriverId()
    {
        return $this->driverId;
    }

    /**
     * @param int $driverId
     * @return $this
     */
    public function setDriverId($driverId)
    {
        $this->driverId = (int)$driverId;
        return $this;
    }

    /**
     * @return array
     */
    public function getFormEntries()
    {
        return $this->formEntries;
    }

    /**
     * @param array $formEntries
     * @return $this
     */
    public function setFormEntries($formEntries)
    {
        $this->formEntries = $formEntries;
        return $this;
    }

    /**
     * @return string
     */
    public function getCompletedOn()
    {
        return $this->completedOn;
    }

    /**
     * @param string $completedOn
     * @return $this
     */
    public function setCompletedOn($completedOn)
    {
        $this->completedOn = $completedOn;
        return $this;
    }

    /**
     * @return string
     */
    public function getExpectedArrival()
    {
        return $this->expectedArrival;
    }

    /**
     * @param string $expectedArrival
     * @return $this
     */
    public function setExpectedArrival($expectedArrival)
    {
        $this->expectedArrival = $expectedArrival;
        return $this;
    }



    /**
     * @return array
     */
    public function toArray()
    {
        return [
            self::ID => $this->getId(),
            self::GROUPS => $this->getGroups(),
            self::SCHEDULE => $this->getSchedule(),
            self::TEMPLATE_ID => $this->getTemplateId(),
            self::TEMPLATE => $this->getTemplate(),
            self::TEMPLATE_ENTRIES => $this->getTemplateEntries(),
            self::FORM_ID => $this->getFormId(),
            self::FORM_ENTRY_ID => $this->getFormEntryId(),
            self::FORM => $this->getForm(),
            self::FORM_ENTRY => $this->getFormEntry(),
            self::FORM_NAME => $this->getFormName(),
            self::PRODUCTS => $this->getProducts(),
            self::ROUTE_ID => $this->getRouteId(),
            self::NAME => $this->getName(),
            self::COMMENTS => $this->getComments(),
            self::STATUS => $this->getStatus(),
            self::DELIVERED => $this->getDelivered(),
            self::DURATION => $this->getDuration(),
            self::DRIVER_ID => $this->getDriverId(),
            self::FORM_ENTRIES => $this->getFormEntries(),
            self::COMPLETED_ON => $this->getCompletedOn(),
            self::EXCEPTED_ARRIVAL => $this->getExpectedArrival()
        ];
    }
}