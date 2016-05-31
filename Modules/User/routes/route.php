<?php

use Zend\Soap\AutoDiscover;
use Modules\User\Mappers\UserMapper;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

$app->get('/users/wsdl', function(ServerRequestInterface $request, ResponseInterface $response) use ($app){

    $autodiscover = new AutoDiscover();

    $autodiscover
        ->setClass('Modules\\User\\UserService')
        ->setServiceName('User')
        ->setUri(WEBSERVICE_URL . UserMapper::URL);

    $streamXml = GuzzleHttp\Psr7\stream_for($autodiscover->toXml());

    return $response
        ->withHeader('Content-type', 'Content-type: application/xml; charset=utf-8')
        ->withBody($streamXml);

});


$app->post('/users',function() use ($app){

    $options = array('uri' =>WEBSERVICE_URL,'location' => WEBSERVICE_URL);

    $server = new SoapServer(WEBSERVICE_URL . UserMapper::URL . '/wsdl', $options);
    $server->setClass('Modules\\User\\UserService');

    $server->handle();
});