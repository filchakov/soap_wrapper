<?php

use Modules\FormEntries\Mappers\FormEntriesMapper;
use Zend\Soap\AutoDiscover;


use Zend\Soap\Wsdl\ComplexTypeStrategy\ArrayOfTypeSequence;

$app->get('/form-entries.wsdl', function() use ($app){

    $serverWSDL = new AutoDiscover(new ArrayOfTypeSequence());

    $serverWSDL
        ->setClass('Modules\\FormEntries\\FormEntriesService')
        ->setOperationBodyStyle(array('use' => 'literal'))
        ->setServiceName('FormEntries')
        ->setUri(WEBSERVICE_URL . FormEntriesMapper::URL);

    header('Content-type: application/xml; charset=utf-8');
    echo $serverWSDL->toXml();
    die;
});


$app->post('/form-entries',function() use ($app){

    $options = array('uri' => WEBSERVICE_URL,'location' => WEBSERVICE_URL);

    $server = new SoapServer(WEBSERVICE_URL . FormEntriesMapper::URL . '.wsdl', $options);
    $server->setClass('Modules\\FormEntries\\FormEntriesService');
    $server->handle();

});