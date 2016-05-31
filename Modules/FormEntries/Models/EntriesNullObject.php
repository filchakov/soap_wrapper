<?php

namespace Modules\FormEntries\Models;


class EntriesNullObject extends Entries
{
    public function __construct(){
        parent::__construct("", "");
    }

    /**
     * @return array
     */
    public function toArray(){
        return [];
    }

}