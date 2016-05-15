<?php

namespace Modules\WorkOrder\Models;

class TemplateNullObject extends Template
{
    public function __construct(){
        parent::__construct(0, '', new FormCollection());
    }

    public function toArray(){
        return [];
    }
}