<?php

namespace Modules\Form\Models;


use Modules\LibraryModule\ArraySerializable;

class Form implements ArraySerializable
{

    const ID = 'id';
    const BUILDER = 'builder';
    const SCHEMA = 'schema';
    const LAYOUT = 'layout';
    const DRIVE_STATUS = 'driveStatus';

    /**
     * @var int
     */
    public $id = 0;

    /**
     * @var string
     */
    public $builder = '';

    /**
     * @var string
     */
    public $schema = '';

    /**
     * @var string
     */
    public $layout = '';

    /**
     * @var string
     */
    public $driveStatus = '';

    /**
     * Form constructor.
     * @param int $id
     * @param string $builder
     * @param string $schema
     * @param string $layout
     * @param string $driveStatus
     */
    public function __construct($id, $builder, $schema, $layout, $driveStatus)
    {
        $this
            ->setId($id)
            ->setBuilder($builder)
            ->setSchema($schema)
            ->setLayout($layout)
            ->setDriveStatus($driveStatus);
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
     * @return Form
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return array
     */
    public function getBuilder()
    {
        return $this->builder;
    }

    /**
     * @param string $builder
     * @return Form
     */
    public function setBuilder($builder)
    {
        $this->builder = $builder;
        return $this;
    }

    /**
     * @return array
     */
    public function getSchema()
    {
        return $this->schema;
    }

    /**
     * @param string $schema
     * @return Form
     */
    public function setSchema($schema)
    {
        $this->schema = $schema;
        return $this;
    }

    /**
     * @return array
     */
    public function getLayout()
    {
        return $this->layout;
    }

    /**
     * @param string $layout
     * @return Form
     */
    public function setLayout($layout)
    {
        $this->layout = $layout;
        return $this;
    }

    /**
     * @return string
     */
    public function getDriveStatus()
    {
        return $this->driveStatus;
    }

    /**
     * @param string $driveStatus
     * @return Form
     */
    public function setDriveStatus($driveStatus)
    {
        $this->driveStatus = $driveStatus;
        return $this;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            self::ID => $this->getId(),
            self::BUILDER => $this->getBuilder(),
            self::SCHEMA => $this->getSchema(),
            self::LAYOUT => $this->getLayout(),
            self::DRIVE_STATUS => $this->getDriveStatus(),
        ];
    }
}