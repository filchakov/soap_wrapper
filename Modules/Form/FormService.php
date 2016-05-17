<?php

namespace Modules\Form;

use Modules\Contact\Models\Contact;
use Modules\Form\Mappers\FormMapper;
use Modules\Form\Models\Form;
use Modules\Form\Models\FormCollection;

class FormService
{

    private $mapper = null;

    /**
     * FormService constructor.
     */
    public function __construct()
    {
        $this->setMapper(new FormMapper());
    }

    /**
     * Show all contacts
     * @return \Modules\Form\Models\FormCollection
     */
    public function show()
    {
        $result = $this->getMapper()->show();

        $collection = new FormCollection();
        foreach ($result as $key => $item) {
            $collection->addItem($this->getMapper()->buildObject($item), $key);
        }

        return $collection;
    }

    /**
     * Show a single contact
     * @param integer $id
     * @return \Modules\Form\Models\Form
     */
    public function get(integer $id)
    {
        return $this->getMapper()->get($id);
    }

    /**
     * Insert new form
     * @param array $builder
     * @param array $schema
     * @param array $layout
     * @param string $driveStatus
     * @return \Modules\Form\Models\Form
     */
    public function insert($builder = [], $schema = [], $layout = [], string $driveStatus)
    {
        $contact = new Form(0, $builder, $schema, $layout, $driveStatus);
        return $this->getMapper()->insert($contact->toArray());
    }

    /**
     * Update single form
     * @param integer $id
     * @param array $builder
     * @param array $schema
     * @param array $layout
     * @param string $driveStatus
     * @return \Modules\Form\Models\Form
     */
    public function update(integer $id, $builder = [], $schema = [], $layout = [], string $driveStatus)
    {
        $contact = new Form($id, $builder, $schema, $layout, $driveStatus);
        return $this->getMapper()->update($id, $contact->toArray());
    }

    /**
     * Delete contact
     * @param integer $id
     * @return bool
     */
    public function delete(integer $id)
    {
        return $this->getMapper()->delete($id);
    }


    /**
     * @return FormMapper
     */
    private function getMapper()
    {
        return $this->mapper;
    }

    /**
     * @param $client
     * @return $this
     */
    private function setMapper($client)
    {
        $this->mapper = $client;
        return $this;
    }

}