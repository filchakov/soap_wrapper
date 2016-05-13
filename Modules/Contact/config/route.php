<?php

use GuzzleHttp\Stream\Stream;
use Zend\Soap\AutoDiscover;
use Modules\Contact\Mappers\ContactMapper;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Soap\Wsdl\ComplexTypeStrategy\ArrayOfTypeSequence;

$app->get('/contacts.wsdl', function(ServerRequestInterface $request, ResponseInterface $response) use ($app){

    $autodiscover = new AutoDiscover(new ArrayOfTypeSequence());

    $autodiscover
        ->setClass('Modules\\Contact\\ContactService')
        ->setServiceName('Contact')
        ->setUri(WEBSERVICE_URL . ContactMapper::URL);

    header('Content-type: application/xml; charset=utf-8');
    echo Stream::factory($autodiscover->toXml());
    die;
});


$app->post('/contacts',function() use ($app){

    $options = array('uri' => WEBSERVICE_URL,'location' => WEBSERVICE_URL);

    $server = new SoapServer(WEBSERVICE_URL . ContactMapper::URL . '.wsdl', $options);
    $server->setClass('Modules\\Contact\\ContactService');

    $server->handle();
});