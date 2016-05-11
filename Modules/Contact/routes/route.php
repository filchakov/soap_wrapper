<?php

use Zend\Soap\AutoDiscover;
use Modules\Contact\Mappers\ContactMapper;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

$app->get('/contacts/wsdl', function(ServerRequestInterface $request, ResponseInterface $response) use ($app){

    $autodiscover = new AutoDiscover();

    $autodiscover
        ->setClass('Modules\\Contact\\ContactService')
        ->setServiceName('Contact')
        ->setUri(WEBSERVICE_URL . ContactMapper::URL);

    $streamXml = GuzzleHttp\Psr7\stream_for($autodiscover->toXml());

    return $response
        ->withHeader('Content-type', 'Content-type: application/xml; charset=utf-8')
        ->withBody($streamXml);

});


$app->post('/contacts',function() use ($app){

    $options = array('uri' =>WEBSERVICE_URL,'location' => WEBSERVICE_URL);

    $server = new SoapServer(WEBSERVICE_URL . ContactMapper::URL . '/wsdl', $options);
    $server->setClass('Modules\\Contact\\ContactService');

    $server->handle();
});