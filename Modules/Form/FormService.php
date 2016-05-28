<?php

namespace Modules\Form;

use Modules\Form\Mappers\FormMapper;
use Modules\Form\Models\Form;
use Modules\Form\Models\FormCollection;

class FormService extends \Modules\LibraryModule\AbstractService
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
     * Show all forms
     * @param string $accessToken
     * @return \Modules\Form\Models\FormCollection
     */
    public function show($accessToken = '')
    {
        $this->getMapper()->setAccessToken($accessToken);

        $result = $this->getMapper()->show();

        $collection = new FormCollection();
        foreach ($result as $key => $item) {
            /*var_dump($item);
            var_dump($this->getMapper()->buildObject($item));
            die;*/

            $collection->addItem($this->getMapper()->buildObject($item), $key);
        }

        return $collection;
    }

    /**
     * Show a single form
     * @param integer $id
     * @param string $accessToken
     * @return \Modules\Form\Models\Form
     */
    public function get($id = 0, $accessToken = '')
    {
        $this->getMapper()->setAccessToken($accessToken);
        return $this->getMapper()->buildObject($this->getMapper()->get($id));
    }

    /**
     * Insert new form
     * @param string $builder
     * @param string $schema
     * @param string $layout
     * @param string $driveStatus
     * @param string $accessToken
     * @return \Modules\Form\Models\Form
     */
    public function insert($builder = '', $schema = '', $layout = '', $driveStatus = '', $accessToken = '')
    {
        $this->getMapper()->setAccessToken($accessToken);
        $contact = new Form(0, $builder, $schema, $layout, $driveStatus);
        return $this->getMapper()->insert($contact->toArray());
    }

    /**
     * Update single form
     * @param integer $id
     * @param string $builder
     * @param string $schema
     * @param string $layout
     * @param string $driveStatus
     * @param string $accessToken
     * @return \Modules\Form\Models\Form
     */
    public function update($id = 0, $builder = '', $schema = '', $layout = '', $driveStatus = '', $accessToken = '')
    {
        $this->getMapper()->setAccessToken($accessToken);
        $contact = new Form($id, $builder, $schema, $layout, $driveStatus);
        return $this->getMapper()->update($id, $contact->toArray());
    }

    /**
     * Delete form
     * @param integer $id
     * @param string $accessToken
     * @return bool
     */
    public function delete($id = 0, $accessToken = '')
    {
        $this->getMapper()->setAccessToken($accessToken);
        return $this->getMapper()->delete($id);
    }


    /**
     * @return FormMapper
     */
    protected function getMapper()
    {
        return $this->mapper;
    }

    /**
     * @param $client
     * @return $this
     */
    protected function setMapper($client)
    {
        $this->mapper = $client;
        return $this;
    }

}