<?php

include_once('bootstrap.php');

use Zend\Soap\Server as SoapServer;


//Use slim group route to defined web service version
$app->group('/v1', function() use ($app){
    include_once('Modules/Contact/routes/route.php');
    include_once('Modules/Location/routes/route.php');
});

$app->run();
