<?php

namespace Modules\WorkOrder\Models;


use Modules\LibraryModule\ArraySerializable;

class Template implements ArraySerializable
{

    const ID = 'id';
    const NAME = 'name';
    const FORMS = 'forms';

    /**
     * @var int
     */
    public $id = 0;

    /**
     * @var string
     */
    public $name = '';

    /**
     * @var \Modules\WorkOrder\Models\FormCollection
     */
    public $forms = null;

    /**
     * Template constructor.
     * @param int $id
     * @param string $name
     * @param FormCollection $forms
     */
    public function __construct($id, $name, FormCollection $forms)
    {
        $this
            ->setId($id)
            ->setName($name)
            ->setForms($forms);
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
     * @return Template
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
     * @return Template
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return FormCollection
     */
    public function getForms()
    {
        return $this->forms;
    }

    /**
     * @param FormCollection $forms
     * @return Template
     */
    public function setForms($forms)
    {
        $this->forms = $forms;
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
            self::FORMS => $this->getForms(),
        ];
    }
}