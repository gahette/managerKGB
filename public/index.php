<?php

use Router\Router;

require '../vendor/autoload.php';

$router = new Router($_GET['url']);

//====== Missions ======

$router->get('missions', 'App\Controllers\MissionController@index');
$router->get('/mission/:id', 'App\Controllers\MissionController@show');

$router->run();