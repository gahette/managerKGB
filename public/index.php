<?php

use Router\Router;

require '../vendor/autoload.php';
require '../connect.php';

$router = new Router($_GET['url']);

define('VIEWS', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR);
define('SCRIPTS', dirname($_SERVER['SCRIPT_NAME']) . DIRECTORY_SEPARATOR);

//====== Missions ======

$router->get('missions', 'App\Controllers\MissionController@index');
$router->get('/mission/:id', 'App\Controllers\MissionController@show');

$router->run();