<?php

namespace Modules\Form\Models;


class FormNullObject extends Form
{
    public function __construct(){
        parent::__construct(0, null, null, null, '');
    }

    /**
     * @return array
     */
    public function toArray(){
        return [];
    }

}