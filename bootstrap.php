<?php

require '../vendor/autoload.php';

ini_set('display_errors', 'On');
ini_set("soap.wsdl_cache_enabled", "0");
error_reporting(E_ALL);

define("WEBSERVICE_URL", "http://soap_service.local/v1/");
define("REST_SERVER", "https://services.zenduit.com:3041/api/v1/");

$app = new Slim\App();