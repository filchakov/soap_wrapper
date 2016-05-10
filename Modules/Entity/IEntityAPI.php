<?php

namespace Modules\Entity;

interface IEntityAPI {

    function show();

    function get($id);

    function insert($options);

    function update($id, $options);

    function delete($id);

}