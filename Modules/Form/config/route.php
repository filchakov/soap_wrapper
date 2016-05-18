<?php

use Modules\Form\Mappers\FormMapper;
use Zend\Soap\AutoDiscover;


use Zend\Soap\Wsdl\ComplexTypeStrategy\ArrayOfTypeSequence;

$app->get('/forms.wsdl', function() use ($app){

    $serverWSDL = new AutoDiscover(new ArrayOfTypeSequence());

    $serverWSDL
        ->setClass('Modules\\Form\\FormService')
        ->setServiceName('Form')
        ->setUri(WEBSERVICE_URL . FormMapper::URL);

    header('Content-type: application/xml; charset=utf-8');
    echo $serverWSDL->toXml();
    die;
});


$app->post('/forms',function() use ($app){

    $options = array('uri' => WEBSERVICE_URL,'location' => WEBSERVICE_URL);

    $server = new SoapServer(WEBSERVICE_URL . FormMapper::URL . '.wsdl', $options);
    $server->setClass('Modules\\Form\\FormService');

    $server->handle();
});