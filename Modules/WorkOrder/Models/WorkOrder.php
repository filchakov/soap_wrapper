<?php

namespace Modules\WorkOrder\Models;

use Modules\Customer\Models\Customer;
use Modules\LibraryModule\ArraySerializable;

class WorkOrder implements ArraySerializable
{

    const ID = 'id';

    const NAME = 'name';
    const CUSTOMER = 'customer';
    const SCHEDULE = 'schedule';

    const TEMPLATE_ID = 'templateId';
    const COMMENTS = 'comments';
    const STATUS = 'status';
    const COMPLETED_ON = 'completedOn';
    const DURATION = 'duration';
    const DRIVER_ID = 'driverId';
    const EXCEPTED_ARRIVAL = 'expectedArrival';

    /**
     * @var int
     */
    public $id = 0;

    /**
     * @var string
     */
    public $name = '';

    /**
     * @var \Modules\Customer\Models\Customer
     */
    public $customer = null;

    /**
     * @var \Modules\WorkOrder\Models\Schedule
     */
    public $schedule = null;

    /**
     * @var int
     */
    public $templateId = 0;

    /**
     * @var string
     */
    public $comments = '';

    /**
     * @var string
     */
    public $status = '';

    /**
     * @var string
     */
    public $completedOn = '';

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
    public $expectedArrival = '';

    /**
     * WorkOrder constructor.
     * @param int $id
     * @param string $name
     * @param int $customer
     * @param \Modules\WorkOrder\Models\Schedule $schedule
     * @param int $templateId
     * @param string $comments
     * @param string $status
     * @param string $completedOn
     * @param int $duration
     * @param int $driverId
     * @param string $expectedArrival
     */
    public function __construct($id, $name, $customer, Schedule $schedule, $templateId, $comments, $status, $completedOn, $duration, $driverId, $expectedArrival)
    {
        $this
            ->setId($id)
            ->setName($name)
            ->setCustomer($customer)
            ->setSchedule($schedule)
            ->setTemplateId($templateId)
            ->setComments($comments)
            ->setStatus($status)
            ->setCompletedOn($completedOn)
            ->setDuration($duration)
            ->setDriverId($driverId)
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
     * @return WorkOrder
     */
    public function setId($id)
    {
        $this->id = (int)$id;
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
     * @return WorkOrder
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return integer
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * @param integer $customer
     * @return WorkOrder
     */
    public function setCustomer($customer)
    {
        $this->customer = $customer;
        return $this;
    }

    /**
     * @return Schedule
     */
    public function getSchedule()
    {
        return $this->schedule;
    }

    /**
     * @param Schedule $schedule
     * @return WorkOrder
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
     * @return WorkOrder
     */
    public function setTemplateId($templateId)
    {
        $this->templateId = $templateId;
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
     * @return WorkOrder
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
     * @return WorkOrder
     */
    public function setStatus($status)
    {
        $this->status = $status;
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
     * @return WorkOrder
     */
    public function setCompletedOn($completedOn)
    {
        $this->completedOn = $completedOn;
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
     * @return WorkOrder
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;
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
     * @return WorkOrder
     */
    public function setDriverId($driverId)
    {
        $this->driverId = $driverId;
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
            self::NAME => $this->getName(),
            self::CUSTOMER => ['id' => $this->getCustomer()],
            self::SCHEDULE => $this->getSchedule(),
            self::TEMPLATE_ID => $this->getTemplateId(),
            self::COMMENTS => $this->getComments(),
            self::STATUS => $this->getStatus(),
            self::COMPLETED_ON => $this->getCompletedOn(),
            self::DURATION => $this->getDuration(),
            self::DRIVER_ID => $this->getDriverId(),
            self::EXCEPTED_ARRIVAL => $this->getExpectedArrival(),
        ];
    }
}