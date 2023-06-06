<?php

use App\Exceptions\NotFoundException;
use Router\Router;
use Whoops\Handler\PrettyPageHandler;
use Whoops\Run;

require '../vendor/autoload.php';
require '../connect.php';
require '../app/tools/helpers.php';

define('DEBUG_TIME', microtime(true)); //constante temps actuelle

$whoops = new Run;
$whoops->pushHandler(new PrettyPageHandler);
$whoops->register();


$router = new Router($_GET['url']);

define('VIEWS', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR);
define('SCRIPTS', dirname($_SERVER['SCRIPT_NAME']) . DIRECTORY_SEPARATOR);

//====== Missions ======
$router->get('missions', 'App\Controllers\MissionController@index');
$router->get('/mission/:id', 'App\Controllers\MissionController@show');
$router->get('/country/:id', 'App\Controllers\MissionController@country');
$router->get('/agent/:id', 'App\Controllers\MissionController@agent');
$router->get('/contact/:id', 'App\Controllers\MissionController@contact');
$router->get('/target/:id', 'App\Controllers\MissionController@target');
$router->get('/hideout/:id', 'App\Controllers\MissionController@hideout');

//====== Countries ======
$router->get('countries', 'App\Controllers\CountryController@index');

//====== Agents ======
$router->get('agents', 'App\Controllers\AgentController@index');

//====== Contacts ======
$router->get('contacts', 'App\Controllers\ContactController@index');

//====== Targets ======
$router->get('targets', 'App\Controllers\TargetController@index');

//====== Hideouts ======
$router->get('hideouts', 'App\Controllers\HideoutController@index');

//====== Admin/Missions======
$router->get('/admin/missions', 'App\Controllers\Admin\AdminMissionController@index');
$router->get('/admin/missions/create', 'App\Controllers\Admin\AdminMissionController@create');
$router->post('/admin/missions/create', 'App\Controllers\Admin\AdminMissionController@createMission');
$router->post('admin/missions/delete/:id', 'App\Controllers\Admin\AdminMissionController@delete');
$router->get('admin/missions/edit/:id', 'App\Controllers\Admin\AdminMissionController@edit');
$router->post('admin/missions/edit/:id', 'App\Controllers\Admin\AdminMissionController@update');

try {
    $router->run();
} catch (NotFoundException $e) {
    $e->errorNotFound();
}
