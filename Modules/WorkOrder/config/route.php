<?php

use Modules\WorkOrder\Mappers\WorkOrderMapper;
use Zend\Soap\AutoDiscover;


use Zend\Soap\Wsdl\ComplexTypeStrategy\ArrayOfTypeSequence;

$app->get('/work-orders.wsdl', function () use ($app) {

    $serverWSDL = new AutoDiscover(new ArrayOfTypeSequence());

    $serverWSDL
        ->setClass('Modules\\WorkOrder\\WorkOrderService')
        ->setServiceName('WorkOrder')
        ->setUri(WEBSERVICE_URL . WorkOrderMapper::URL);

    header('Content-type: application/xml; charset=utf-8');
    echo $serverWSDL->toXml();
    die;
});

$app->get('/literal/work-orders.wsdl', function () use ($app) {

    $serverWSDL = new AutoDiscover(new ArrayOfTypeSequence());

    $serverWSDL
        ->setClass('Modules\\WorkOrder\\WorkOrderService')
        ->setServiceName('WorkOrder')
        ->setOperationBodyStyle(array('use' => 'literal'))
        ->setUri(WEBSERVICE_URL . WorkOrderMapper::URL);

    header('Content-type: application/xml; charset=utf-8');
    echo $serverWSDL->toXml();
    die;
});

$app->post('/work-orders', function () use ($app) {

    $options = array('uri' => WEBSERVICE_URL, 'location' => WEBSERVICE_URL);

    $server = new SoapServer(WEBSERVICE_URL . WorkOrderMapper::URL . '.wsdl', $options);
    $server->setClass('Modules\\WorkOrder\\WorkOrderService');
    $server->handle();
});