<?php

namespace Modules\WorkOrder\Models;

use Modules\LibreryModule\ArraySerializable;

class Schedule implements ArraySerializable
{

    const DATE = 'date';
    const FROM = 'from';
    const TO = 'to';

    /**
     * @var string
     */
    public $date = '';

    /**
     * @var int
     */
    public $from = 0;

    /**
     * @var int
     */
    public $to = 0;

    /**
     * Schedule constructor.
     * @param string $data
     * @param int $from
     * @param int $to
     */
    public function __construct($data, $from, $to)
    {
        $this
            ->setDate($data)
            ->setFrom($from)
            ->setTo($to);
    }


    /**
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param string $date
     * @return $this
     */
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return int
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @param int $from
     * @return $this
     */
    public function setFrom($from)
    {
        $this->from = (int)$from;
        return $this;
    }

    /**
     * @return int
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * @param int $to
     * @return $this
     */
    public function setTo($to)
    {
        $this->to = (int)$to;
        return $this;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            self::DATA => $this->getDate(),
            self::FROM => $this->getFrom(),
            self::TO => $this->getTo(),
        ];
    }
}