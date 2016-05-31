<?php

use Zend\Soap\AutoDiscover;
use Modules\Contact\Mappers\ContactMapper;


use Zend\Soap\Wsdl\ComplexTypeStrategy\ArrayOfTypeSequence;

$app->get('/contacts.wsdl', function() use ($app){

    $serverWSDL = new AutoDiscover(new ArrayOfTypeSequence());

    $serverWSDL
        ->setClass('Modules\\Contact\\ContactService')
        ->setServiceName('Contact')
        ->setUri(WEBSERVICE_URL . ContactMapper::URL);

    header('Content-type: application/xml; charset=utf-8');
    echo $serverWSDL->toXml();
    die;
});

$app->get('/literal/contacts.wsdl', function() use ($app){

    $serverWSDL = new AutoDiscover(new ArrayOfTypeSequence());

    $serverWSDL
        ->setClass('Modules\\Contact\\ContactService')
        ->setOperationBodyStyle(array('use' => 'literal'))
        ->setServiceName('Contact')
        ->setUri(WEBSERVICE_URL . ContactMapper::URL);

    header('Content-type: application/xml; charset=utf-8');
    echo $serverWSDL->toXml();
    die;
});


$app->post('/contacts',function() use ($app){

    $options = array('uri' => WEBSERVICE_URL,'location' => WEBSERVICE_URL);

    $server = new SoapServer(WEBSERVICE_URL . ContactMapper::URL . '.wsdl', $options);
    $server->setClass('Modules\\Contact\\ContactService');

    $server->handle();
});