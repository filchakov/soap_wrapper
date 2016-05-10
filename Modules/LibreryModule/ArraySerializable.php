<?php
/**
 * Created by PhpStorm.
 * User: denisfilchakov
 * Date: 10.05.16
 * Time: 21:19
 */

namespace Modules\LibreryModule;


interface ArraySerializable
{
    /**
     * @return array
     */
    public function toArray();
}