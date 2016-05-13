<?php

use GuzzleHttp\Stream\Stream;
use Zend\Soap\AutoDiscover;
use Modules\Location\Mappers\LocationMapper;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Soap\Wsdl\ComplexTypeStrategy\ArrayOfTypeSequence;

$app->get('/locations.wsdl', function (ServerRequestInterface $request, ResponseInterface $response) use ($app) {

    $autodiscover = new AutoDiscover(new ArrayOfTypeSequence());

    $autodiscover
        ->setClass('Modules\\Location\\LocationService')
        ->setServiceName('Location')
        ->setUri(WEBSERVICE_URL . LocationMapper::URL);

    header('Content-type: application/xml; charset=utf-8');
    echo Stream::factory($autodiscover->toXml());
    die;
});

$app->post('/locations', function () use ($app) {

    $options = array('uri' => WEBSERVICE_URL, 'location' => WEBSERVICE_URL);

    $server = new SoapServer(WEBSERVICE_URL . LocationMapper::URL . '.wsdl', $options);
    $server->setClass('Modules\\Location\\LocationService');

    $server->handle();
});