<?php
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Debug\Debug;

$loader = require_once __DIR__.'/../vendor/autoload.php';
$loader = require_once __DIR__.'/../config/autoload.php';

umask(0000);

// load the environmental variables
$dotenv = new Dotenv\Dotenv(__DIR__.'/../');
$dotenv->load();
$env = $_SERVER['SYMFONY_ENV'];
$debug = $_SERVER['SYMFONY_DEBUG'];

if ($debug) {
    Debug::enable();
}
require_once __DIR__.'/../AppKernel.php';
$kernel = new AppKernel($env, $debug);
$kernel->loadClassCache();
$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);