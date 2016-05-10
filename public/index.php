<?php

include_once('../bootstrap.php');

use Modules\Contact\ContactMapperAPI;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Soap\AutoDiscover;
use Zend\Soap\Server as SoapServer;


//Use slim group route to defined web service version
$app->group('/v1', function() use ($app){

    $app->get('/contacts/wsdl', function(ServerRequestInterface $request, ResponseInterface $response) use ($app){

        $autodiscover = new AutoDiscover();

        $autodiscover
            ->setClass('Modules\\Contact\\ContactService')
            ->setServiceName('Contact')
            ->setUri(WEBSERVICE_URL . ContactMapperAPI::URL);

        $streamXml = GuzzleHttp\Psr7\stream_for($autodiscover->toXml());

        return $response
            ->withHeader('Content-type', 'Content-type: application/xml; charset=utf-8')
            ->withBody($streamXml);

    });


    //URL Endpoint of your web service
    $app->post('/contacts',function() use ($app){

        $options = array('uri' =>WEBSERVICE_URL,'location' => WEBSERVICE_URL);

        $server = new SoapServer(WEBSERVICE_URL . ContactMapperAPI::URL . '/wsdl', $options);
        $server->setClass('Modules\\Contact\\ContactService');
        //var_dump($server->handle());die;

        $server->handle();
    });
});

$app->run();
