<?php

namespace Modules\FormEntries;

use Modules\FormEntries\Mappers\FormEntriesMapper;
use Modules\FormEntries\Models\FormEntries;
use Modules\FormEntries\Models\FormEntriesCollection;

class FormEntriesService extends \Modules\LibraryModule\AbstractService
{

    private $mapper = null;

    /**
     * FormEntriesService constructor.
     */
    public function __construct()
    {
        $this->setMapper(new FormEntriesMapper());
    }

    /**
     * Show all form-entries
     * @param string $accessToken
     * @return \Modules\FormEntries\Models\FormEntriesCollection
     */
    public function show($accessToken = '')
    {
        $this->getMapper()->setAccessToken($accessToken);
        $result = $this->getMapper()->show();
        $collection = new FormEntriesCollection();
        foreach ($result as $key => $item) {
            $collection->addItem($this->getMapper()->buildObject($item), $key);
        }

        return $collection;
    }

    /**
     * Show single form-entry
     * @param integer $id
     * @param string $accessToken
     * @return \Modules\FormEntries\Models\FormEntries
     */
    public function get($id = 0, $accessToken = '')
    {
        $this->getMapper()->setAccessToken($accessToken);
        return $this->getMapper()->get($id);
    }

    /**
     * Inserts new form-entry
     * @param int $formId
     * @param string $entry
     * @param string $accessToken
     * @return \Modules\FormEntries\Models\FormEntries
     */
    public function insert($formId = 0, $entry = '', $accessToken = '')
    {
        $this->getMapper()->setAccessToken($accessToken);
        $formEntries = new FormEntries(0, $formId, $entry);
        return $this->getMapper()->insert($formEntries->toArray());
    }

    /**
     * Update single form-entry
     * @param integer $id
     * @param int $formId
     * @param string $entry
     * @param string $accessToken
     * @return \Modules\FormEntries\Models\FormEntries
     */
    public function update($id = 0, $formId = 0, $entry = '', $accessToken = '')
    {
        $this->getMapper()->setAccessToken($accessToken);
        $formEntries = new FormEntries($id, $formId, $entry);
        return $this->getMapper()->update($id, $formEntries->toArray());
    }

    /**
     * Delete form-entry
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
     * @return FormEntriesMapper
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