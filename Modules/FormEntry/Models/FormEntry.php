<?php

namespace Modules\Form\Models;

use Modules\LibreryModule\ArraySerializable;

class FormInsert implements ArraySerializable
{

    const ID = 'id';
    const FORM_ID = 'formId';
    const ENTRY = 'entry';

    /**
     * @var int
     */
    public $id = 0;

    /**
     * @var int
     */
    public $formId = 0;

    /**
     * @var array
     */
    public $entry = [];

    /**
     * Form constructor.
     * @param int $id
     * @param int $formId
     * @param array $entry
     */
    public function __construct($id, $formId, array $entry)
    {
        $this
            ->setId($id)
            ->setFormId($formId)
            ->setEntry($entry);
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
     * @return array
     */
    public function getEntry()
    {
        return $this->entry;
    }

    /**
     * @param array $entry
     * @return $this
     */
    public function setEntry($entry)
    {
        $this->entry = $entry;
        return $this;
    }


    /**
     * @return array
     */
    public function toArray()
    {
        return [
            self::ID => $this->getId(),
            self::FORM_ID => $this->getFormId(),
            self::ENTRY => $this->getEntry(),
        ];
    }
}