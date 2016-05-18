<?php

namespace Modules\WorkOrder\Mappers;


use Modules\Customer\Mappers\CustomerAdressMapper;
use Modules\Customer\Models\CustomerAdress;
use Modules\LibreryModule\Entity\EntityMapper;
use Modules\WorkOrder\Models\Form;
use Modules\WorkOrder\Models\FormCollection;
use Modules\WorkOrder\Models\Schedule;
use Modules\WorkOrder\Models\Template;
use Modules\WorkOrder\Models\TemplateNullObject;
use Modules\WorkOrder\Models\WorkOrderFull;

class WorkOrderMapper extends EntityMapper
{
    const URL = 'work-orders';

    public function __construct(){
        parent::__construct(self::URL);
    }

    /**
     * @param array $objectData
     * @return \Modules\WorkOrder\Models\WorkOrderFull
     */
    public function buildObject(array $objectData)
    {
        if(!count($objectData)){
            return new \Modules\WorkOrder\Models\WorkOrderFullNullObject();
        }

        $customerMapper = new CustomerAdressMapper();
        $customerAdress = $customerMapper->buildObject($objectData[WorkOrderFull::CUSTOMER]);


        $schedule = new Schedule(
            $objectData[WorkOrderFull::SCHEDULE][Schedule::DATE],
            $objectData[WorkOrderFull::SCHEDULE][Schedule::FROM],
            $objectData[WorkOrderFull::SCHEDULE][Schedule::TO]
        );

        /**
         * Build template START
         */

        $formCollection = new FormCollection();

        foreach($objectData[WorkOrderFull::TEMPLATE][Template::FORMS] as $key => $formItem){

            $tmpForm = new Form(
                $formItem[Form::ID],
                $formItem[Form::BUILDER],
                $formItem[Form::SCHEMA],
                $formItem[Form::LAYOUT],
                $formItem[Form::DRIVE_STATUS]
            );

            $formCollection->addItem($tmpForm, $key);
        }

        $template = new Template(
            $objectData[WorkOrderFull::TEMPLATE][Template::ID],
            $objectData[WorkOrderFull::TEMPLATE][Template::NAME],
            $formCollection
        );

        /**
         * Build template FINISH
         */


        $form = new Form(
            $objectData[WorkOrderFull::FORM][Form::ID],
            $objectData[WorkOrderFull::FORM][Form::BUILDER],
            $objectData[WorkOrderFull::FORM][Form::SCHEMA],
            $objectData[WorkOrderFull::FORM][Form::LAYOUT],
            $objectData[WorkOrderFull::FORM][Form::DRIVE_STATUS]
        );

        return new WorkOrderFull(
            $objectData[WorkOrderFull::ID],
            $objectData[WorkOrderFull::GROUPS],
            $customerAdress,
            $schedule,
            $objectData[WorkOrderFull::TEMPLATE_ID],
            $template,
            $objectData[WorkOrderFull::TEMPLATE_ENTRIES],
            $objectData[WorkOrderFull::FORM_ID],
            $objectData[WorkOrderFull::FORM_ENTRY_ID],
            $form,
            $objectData[WorkOrderFull::FORM_ENTRY],
            $objectData[WorkOrderFull::FORM_NAME],
            $objectData[WorkOrderFull::PRODUCTS],
            $objectData[WorkOrderFull::ROUTE_ID],
            $objectData[WorkOrderFull::NAME],
            $objectData[WorkOrderFull::COMMENTS],
            $objectData[WorkOrderFull::STATUS],
            $objectData[WorkOrderFull::DELIVERED],
            $objectData[WorkOrderFull::DURATION],
            $objectData[WorkOrderFull::DRIVER_ID],
            $objectData[WorkOrderFull::FORM_ENTRIES],
            $objectData[WorkOrderFull::COMPLETED_ON],
            $objectData[WorkOrderFull::EXCEPTED_ARRIVAL]
        );
    }
}