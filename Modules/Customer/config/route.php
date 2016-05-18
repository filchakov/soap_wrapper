<?php

use Modules\Customer\Mappers\CustomerAddressMapper;
use Zend\Soap\AutoDiscover;


use Zend\Soap\Wsdl\ComplexTypeStrategy\ArrayOfTypeSequence;

$app->get('/customers.wsdl', function() use ($app){

    $serverWSDL = new AutoDiscover(new ArrayOfTypeSequence());

    $serverWSDL
        ->setClass('Modules\\Customer\\CustomerService')
        ->setServiceName('Customer')
        ->setUri(WEBSERVICE_URL . CustomerAddressMapper::URL);

    header('Content-type: application/xml; charset=utf-8');
    echo $serverWSDL->toXml();
    die;
});


$app->post('/customers',function() use ($app){

    $options = array('uri' => WEBSERVICE_URL,'location' => WEBSERVICE_URL);

    $server = new SoapServer(WEBSERVICE_URL . CustomerAddressMapper::URL . '.wsdl', $options);
    $server->setClass('Modules\\Customer\\CustomerService');

    $server->handle();
});