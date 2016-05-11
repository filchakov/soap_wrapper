<?php

require 'vendor/autoload.php';

ini_set('display_errors', 'On');
ini_set("soap.wsdl_cache_enabled", "0");
error_reporting(E_ALL);

define("CURRENT_VERSION", "v1");
define("WEBSERVICE_URL", "http://" . $_SERVER['HTTP_HOST'] . "/". CURRENT_VERSION ."/");

define("REST_SERVER", "https://zenworkapi.zenduit.com:3041/api/v1/");

$app = new Slim\App();