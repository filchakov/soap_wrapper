<?php

namespace Modules\LibraryModule;

interface ArraySerializable
{
    /**
     * @return array
     */
    public function toArray();
}