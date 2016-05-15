<?php

use Modules\WorkOrder\Mappers\WorkOrderMapper;
use Zend\Soap\AutoDiscover;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Soap\Wsdl\ComplexTypeStrategy\ArrayOfTypeSequence;

$app->get('/work-orders.wsdl', function (ServerRequestInterface $request, ResponseInterface $response) use ($app) {

    $autodiscover = new AutoDiscover(new ArrayOfTypeSequence());

    $autodiscover
        ->setClass('Modules\\WorkOrder\\WorkOrderService')
        ->setServiceName('WorkOrder')
        ->setUri(WEBSERVICE_URL . WorkOrderMapper::URL);

    header('Content-type: application/xml; charset=utf-8');
    echo $autodiscover->toXml();
    die;
});

$app->post('/work-orders', function () use ($app) {

    $options = array('uri' => WEBSERVICE_URL, 'location' => WEBSERVICE_URL);

    $server = new SoapServer(WEBSERVICE_URL . WorkOrderMapper::URL . '.wsdl', $options);
    $server->setClass('Modules\\WorkOrder\\WorkOrderService');

    $server->handle();
});