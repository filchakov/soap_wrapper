<?php

namespace Modules\Customer\Models;


use Modules\LibreryModule\ArraySerializable;

class Customer implements ArraySerializable
{

    const ID = 'id';
    const NAME = 'name';

    /**
     * @var int
     */
    public $id = 0;

    /**
     * @var string
     */
    public $name = '';

    /**
     * Customer constructor.
     * @param int $id
     * @param string $name
     */
    public function __construct($id, $name)
    {
        $this
            ->setId($id)
            ->setName($name);
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
     * @return array
     */
    public function toArray()
    {
        return [
            self::ID => $this->getId(),
            self::NAME => $this->getName()
        ];
    }
}