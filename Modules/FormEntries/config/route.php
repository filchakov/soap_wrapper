<?php

use Modules\FormEntries\Mappers\FormEntriesMapper;
use Zend\Soap\AutoDiscover;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Soap\Wsdl\ComplexTypeStrategy\ArrayOfTypeSequence;

$app->get('/form-entries.wsdl', function(ServerRequestInterface $request, ResponseInterface $response) use ($app){

    $autodiscover = new AutoDiscover(new ArrayOfTypeSequence());

    $autodiscover
        ->setClass('Modules\\FormEntries\\FormEntriesService')
        ->setServiceName('FormEntries')
        ->setUri(WEBSERVICE_URL . FormEntriesMapper::URL);

    header('Content-type: application/xml; charset=utf-8');
    echo $autodiscover->toXml();
    die;
});


$app->post('/form-entries',function() use ($app){

    $options = array('uri' => WEBSERVICE_URL,'location' => WEBSERVICE_URL);

    $server = new SoapServer(WEBSERVICE_URL . FormEntriesMapper::URL . '.wsdl', $options);
    $server->setClass('Modules\\FormEntries\\FormEntriesService');
    $server->handle();

});