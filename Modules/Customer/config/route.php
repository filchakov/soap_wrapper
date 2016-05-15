<?php

use Modules\Customer\Mappers\CustomerAdressMapper;
use Zend\Soap\AutoDiscover;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Soap\Wsdl\ComplexTypeStrategy\ArrayOfTypeSequence;

$app->get('/customers.wsdl', function(ServerRequestInterface $request, ResponseInterface $response) use ($app){

    $autodiscover = new AutoDiscover(new ArrayOfTypeSequence());

    $autodiscover
        ->setClass('Modules\\Customer\\CustomerService')
        ->setServiceName('Customer')
        ->setBindingStyle(array('style' => 'document'))
        ->setUri(WEBSERVICE_URL . CustomerAdressMapper::URL);

    header('Content-type: application/xml; charset=utf-8');
    echo $autodiscover->toXml();
    die;
});


$app->post('/customers',function() use ($app){

    $options = array('uri' => WEBSERVICE_URL,'location' => WEBSERVICE_URL);

    $server = new SoapServer(WEBSERVICE_URL . CustomerAdressMapper::URL . '.wsdl', $options);
    $server->setClass('Modules\\Customer\\CustomerService');

    $server->handle();
});