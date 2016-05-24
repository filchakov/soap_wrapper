<?php

include_once('bootstrap.php');

use Zend\Soap\Server as SoapServer;


//Use slim group route to defined web service version
$app->group('/v1', function() use ($app){
    include_once('Modules/Contact/config/route.php');
    include_once('Modules/Location/config/route.php');
    include_once('Modules/WorkOrder/config/route.php');
    include_once('Modules/Customer/config/route.php');
    include_once('Modules/Form/config/route.php');
    include_once('Modules/FormEntries/config/route.php');
    include_once('Modules/User/config/route.php');
});

$app->run();
