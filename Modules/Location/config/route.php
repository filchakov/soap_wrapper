<?php

use Zend\Soap\AutoDiscover;
use Modules\Location\Mappers\LocationMapper;


use Zend\Soap\Wsdl\ComplexTypeStrategy\ArrayOfTypeSequence;

$app->get('/locations.wsdl', function () use ($app) {

    $serverWSDL = new AutoDiscover(new ArrayOfTypeSequence());

    $serverWSDL
        ->setClass('Modules\\Location\\LocationService')
        ->setServiceName('Location')
        ->setUri(WEBSERVICE_URL . LocationMapper::URL);

    header('Content-type: application/xml; charset=utf-8');
    echo $serverWSDL->toXml();
    die;
});

$app->post('/locations', function () use ($app) {

    $options = array('uri' => WEBSERVICE_URL, 'location' => WEBSERVICE_URL);

    $server = new SoapServer(WEBSERVICE_URL . LocationMapper::URL . '.wsdl', $options);
    $server->setClass('Modules\\Location\\LocationService');

    $server->handle();
});