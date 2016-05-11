<?php

use Zend\Soap\AutoDiscover;
use Modules\Location\Mappers\LocationMapper;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

$app->get('/locations/wsdl', function(ServerRequestInterface $request, ResponseInterface $response) use ($app){

$autodiscover = new AutoDiscover();

$autodiscover
->setClass('Modules\\Location\\LocationService')
->setServiceName('Location')
->setUri(WEBSERVICE_URL . LocationMapper::URL);

$streamXml = GuzzleHttp\Psr7\stream_for($autodiscover->toXml());

return $response
->withHeader('Content-type', 'Content-type: application/xml; charset=utf-8')
->withBody($streamXml);

});

$app->post('/locations',function() use ($app){

    $options = array('uri' => WEBSERVICE_URL,'location' => WEBSERVICE_URL);

    $server = new SoapServer(WEBSERVICE_URL . LocationMapper::URL . '/wsdl', $options);
    $server->setClass('Modules\\Location\\LocationService');

    $server->handle();
});