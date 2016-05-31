<?php

use Zend\Soap\AutoDiscover;
use Modules\User\Mappers\UserMapper;


use Zend\Soap\Wsdl\ComplexTypeStrategy\ArrayOfTypeSequence;

$app->get('/literal/users.wsdl', function() use ($app){

    $serverWSDL = new AutoDiscover(new ArrayOfTypeSequence());

    $serverWSDL
        ->setClass('Modules\\User\\UserService')
        ->setOperationBodyStyle(array('use' => 'literal'))
        ->setServiceName('User')
        ->setUri(WEBSERVICE_URL . UserMapper::URL);

    header('Content-type: application/xml; charset=utf-8');
    echo $serverWSDL->toXml();
    die;
});

$app->get('/users.wsdl', function() use ($app){

    $serverWSDL = new AutoDiscover(new ArrayOfTypeSequence());

    $serverWSDL
        ->setClass('Modules\\User\\UserService')
        ->setServiceName('User')
        ->setUri(WEBSERVICE_URL . UserMapper::URL);

    header('Content-type: application/xml; charset=utf-8');
    echo $serverWSDL->toXml();
    die;
});

$app->post('/users',function() use ($app){

    $options = array('uri' => WEBSERVICE_URL,'location' => WEBSERVICE_URL);

    $server = new SoapServer(WEBSERVICE_URL . UserMapper::URL . '.wsdl', $options);
    $server->setClass('Modules\\User\\UserService');

    $server->handle();
});