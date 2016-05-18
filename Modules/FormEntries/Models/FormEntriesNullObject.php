<?php

namespace Modules\FormEntries\Models;


class FormEntriesNullObject extends FormEntries
{
    public function __construct(){
        parent::__construct(0, 0, []);
    }

    /**
     * @return array
     */
    public function toArray(){
        return [];
    }

}