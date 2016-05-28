<?php

namespace Modules\WorkOrder;


use Modules\Customer\Models\Customer;
use Modules\WorkOrder\Mappers\WorkOrderMapper;
use Modules\WorkOrder\Models\Schedule;
use Modules\WorkOrder\Models\WorkOrder;
use Modules\WorkOrder\Models\WorkOrderFullCollection;

class WorkOrderService extends \Modules\LibraryModule\AbstractService
{
    private $mapper = null;

    /**
     * WorkOrderService constructor.
     */
    public function __construct()
    {
        $this->setMapper(new WorkOrderMapper());
    }

    /**
     * Show all work orders
     * @param string $status
     * @param string $accessToken
     * @return \Modules\WorkOrder\Models\WorkOrderFullCollection
     * @throws \Exception
     */
    public function show($status, $accessToken = '')
    {
        $this->getMapper()->setAccessToken($accessToken);

        $result = $this->getMapper()->setQueryParams(['status' => $status])->show();

        $collection = new WorkOrderFullCollection();
        foreach ($result as $key => $item) {
            $collection->addItem($this->getMapper()->buildObject($item), $key);
        }

        return $collection;
    }

    /**
     * Show a single work order
     * @param integer $id
     * @param string $accessToken
     * @return \Modules\WorkOrder\Models\WorkOrderFull
     */
    public function get($id = 0, $accessToken = '')
    {
        $this->getMapper()->setAccessToken($accessToken);

        $result = $this->getMapper()->get($id);
        return $this->getMapper()->buildObject($result);
    }

    /**
     * Insert new work order
     * @param string $name
     * @param \Modules\Customer\Models\Customer $customer
     * @param \Modules\WorkOrder\Models\Schedule $schedule
     * @param integer $templateId
     * @param string $comments
     * @param string $status
     * @param string $completedOn
     * @param integer $duration
     * @param integer $driverId
     * @param string $expectedArrival
     * @param string $accessToken
     * @return \Modules\WorkOrder\Models\WorkOrderFull
     */
    public function insert($name = '', Customer $customer, Schedule $schedule, $templateId = 0, $comments = '', $status = '', $completedOn = '', $duration = 0, $driverId = 0, $expectedArrival = '', $accessToken = '')
    {
        $this->getMapper()->setAccessToken($accessToken);

        $workOrder = new WorkOrder(0, $name, $customer, $schedule, $templateId, $comments, $status, $completedOn, $duration, $driverId, $expectedArrival);
        $workOrderFull = $this->getMapper()->insert($workOrder->toArray());
        return $this->getMapper()->buildObject($workOrderFull);
    }

    /**
     * Update work order
     * @param integer $id
     * @param string $name
     * @param \Modules\Customer\Models\Customer $customer
     * @param \Modules\WorkOrder\Models\Schedule $schedule
     * @param integer $templateId
     * @param string $comments
     * @param string $status
     * @param string $completedOn
     * @param integer $duration
     * @param integer $driverId
     * @param string $expectedArrival
     * @param string $accessToken
     * @return \Modules\WorkOrder\Models\WorkOrderFull
     */
    public function update($id = 0, $name = '', Customer $customer, Schedule $schedule, $templateId = 0, $comments = '', $status = '', $completedOn = '', $duration = 0, $driverId = 0, $expectedArrival = '', $accessToken = '')
    {
        $this->getMapper()->setAccessToken($accessToken);

        $workOrder = new WorkOrder($id, $name, $customer, $schedule, $templateId, $comments, $status, $completedOn, $duration, $driverId, $expectedArrival);
        $workOrderFull = $this->getMapper()->update($id, $workOrder->toArray());
        return $this->getMapper()->buildObject($workOrderFull);
    }

    /**
     * Delete work order
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
     * @return WorkOrderMapper
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