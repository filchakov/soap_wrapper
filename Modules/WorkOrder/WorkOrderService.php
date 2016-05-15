<?php

namespace Modules\WorkOrder;


use Modules\Customer\Models\Customer;
use Modules\WorkOrder\Mappers\WorkOrderMapper;
use Modules\WorkOrder\Models\Schedule;
use Modules\WorkOrder\Models\WorkOrder;
use Modules\WorkOrder\Models\WorkOrderFullCollection;

class WorkOrderService
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
     * @return \Modules\WorkOrder\Models\WorkOrderFullCollection
     */
    public function show()
    {
        $result = $this->getMapper()->show();

        $collection = new WorkOrderFullCollection();
        foreach ($result as $key => $item) {
            $collection->addItem($this->getMapper()->buildObject($item), $key);
        }

        return $collection;
    }

    /**
     * Show a single work order
     * @param integer $id
     * @return \Modules\WorkOrder\Models\WorkOrderFull
     */
    public function get(integer $id)
    {
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
     * @return \Modules\WorkOrder\Models\WorkOrderFull
     */
    public function insert(string $name, Customer $customer, Schedule $schedule, integer $templateId, string $comments, string $status, string $completedOn, integer $duration, integer $driverId, string $expectedArrival)
    {
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
     * @return \Modules\WorkOrder\Models\WorkOrderFull
     */
    public function update(integer $id, string $name, Customer $customer, Schedule $schedule, integer $templateId, string $comments, string $status, string $completedOn, integer $duration, integer $driverId, string $expectedArrival)
    {
        $workOrder = new WorkOrder($id, $name, $customer, $schedule, $templateId, $comments, $status, $completedOn, $duration, $driverId, $expectedArrival);
        $workOrderFull = $this->getMapper()->update($id, $workOrder->toArray());
        return $this->getMapper()->buildObject($workOrderFull);
    }

    /**
     * Delete work order
     * @param integer $id
     * @return bool
     */
    public function delete(integer $id)
    {
        return $this->getMapper()->delete($id);
    }


    /**
     * @return WorkOrderMapper
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