<?php

namespace Modules\FormEntries\Models;

use Modules\LibraryModule\ArraySerializable;

class Entries implements ArraySerializable
{

    const KEY = 'key';
    const VALUE = 'value';

    /**
     * @var string
     */
    public $key = "";
    
    /**
     * @var string
     */
    public $value = "";

    /**
     * Entries constructor.
     * @param int $key
     * @param int $value
     */
    public function __construct($key, $value)
    {
        $this
            ->setKey($key)
            ->setValue($value);
    }

    /**
     * @return int
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @param int $key
     * @return $this
     */
    public function setKey($key)
    {
        $this->key = $key;
        return $this;
    }

    /**
     * @return int
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param int $value
     * @return $this
     */
    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            self::KEY => $this->getKey(),
            self::VALUE => $this->getValue(),
        ];
    }
}