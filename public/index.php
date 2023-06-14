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

//====== Admin/Countries======
$router->get('/admin/countries', 'App\Controllers\Admin\AdminCountryController@index');
$router->get('/admin/countries/create', 'App\Controllers\Admin\AdminCountryController@create');
$router->post('/admin/countries/create', 'App\Controllers\Admin\AdminCountryController@createCountry');
$router->post('admin/countries/delete/:id', 'App\Controllers\Admin\AdminCountryController@delete');
$router->get('admin/countries/edit/:id', 'App\Controllers\Admin\AdminCountryController@edit');
$router->post('admin/countries/edit/:id', 'App\Controllers\Admin\AdminCountryController@update');

//====== Admin/Status======
$router->get('/admin/status', 'App\Controllers\Admin\AdminStatusController@index');
$router->get('/admin/status/create', 'App\Controllers\Admin\AdminStatusController@create');
$router->post('/admin/status/create', 'App\Controllers\Admin\AdminStatusController@createStatus');
$router->post('admin/status/delete/:id', 'App\Controllers\Admin\AdminStatusController@delete');
$router->get('admin/status/edit/:id', 'App\Controllers\Admin\AdminStatusController@edit');
$router->post('admin/status/edit/:id', 'App\Controllers\Admin\AdminStatusController@update');

//====== Admin/TypesMissions======
$router->get('/admin/typesmissions', 'App\Controllers\Admin\AdminTypeMissionController@index');
$router->get('/admin/typesmissions/create', 'App\Controllers\Admin\AdminTypeMissionController@create');
$router->post('/admin/typesmissions/create', 'App\Controllers\Admin\AdminTypeMissionController@createTypeMission');
$router->post('admin/typesmissions/delete/:id', 'App\Controllers\Admin\AdminTypeMissionController@delete');
$router->get('admin/typesmissions/edit/:id', 'App\Controllers\Admin\AdminTypeMissionController@edit');
$router->post('admin/typesmissions/edit/:id', 'App\Controllers\Admin\AdminTypeMissionController@update');

//====== Admin/TypesHideouts======
$router->get('/admin/typeshideouts', 'App\Controllers\Admin\AdminTypeHideoutController@index');
$router->get('/admin/typeshideouts/create', 'App\Controllers\Admin\AdminTypeHideoutController@create');
$router->post('/admin/typeshideouts/create', 'App\Controllers\Admin\AdminTypeHideoutController@createTypeHideout');
$router->post('admin/typeshideouts/delete/:id', 'App\Controllers\Admin\AdminTypeHideoutController@delete');
$router->get('admin/typeshideouts/edit/:id', 'App\Controllers\Admin\AdminTypeHideoutController@edit');
$router->post('admin/typeshideouts/edit/:id', 'App\Controllers\Admin\AdminTypeHideoutController@update');

//====== Admin/Specialities======
$router->get('/admin/specialities', 'App\Controllers\Admin\AdminSpecialityController@index');
$router->get('/admin/specialities/create', 'App\Controllers\Admin\AdminSpecialityController@create');
$router->post('/admin/specialities/create', 'App\Controllers\Admin\AdminSpecialityController@createSpeciality');
$router->post('admin/specialities/delete/:id', 'App\Controllers\Admin\AdminSpecialityController@delete');
$router->get('admin/specialities/edit/:id', 'App\Controllers\Admin\AdminSpecialityController@edit');
$router->post('admin/specialities/edit/:id', 'App\Controllers\Admin\AdminSpecialityController@update');

//====== Admin/Agents======
$router->get('/admin/agents', 'App\Controllers\Admin\AdminAgentController@index');
$router->get('/admin/agents/create', 'App\Controllers\Admin\AdminAgentController@create');
$router->post('/admin/agents/create', 'App\Controllers\Admin\AdminAgentController@createAgent');
$router->post('admin/agents/delete/:id', 'App\Controllers\Admin\AdminAgentController@delete');
$router->get('admin/agents/edit/:id', 'App\Controllers\Admin\AdminAgentController@edit');
$router->post('admin/agents/edit/:id', 'App\Controllers\Admin\AdminAgentController@update');

//====== Admin/Contacts======
$router->get('/admin/contacts', 'App\Controllers\Admin\AdminContactController@index');
$router->get('/admin/contacts/create', 'App\Controllers\Admin\AdminContactController@create');
$router->post('/admin/contacts/create', 'App\Controllers\Admin\AdminContactController@createContact');
$router->post('admin/contacts/delete/:id', 'App\Controllers\Admin\AdminContactController@delete');
$router->get('admin/contacts/edit/:id', 'App\Controllers\Admin\AdminContactController@edit');
$router->post('admin/contacts/edit/:id', 'App\Controllers\Admin\AdminContactController@update');

//====== Admin/Targets======
$router->get('/admin/targets', 'App\Controllers\Admin\AdminTargetController@index');
$router->get('/admin/targets/create', 'App\Controllers\Admin\AdminTargetController@create');
$router->post('/admin/targets/create', 'App\Controllers\Admin\AdminTargetController@createTarget');
$router->post('admin/targets/delete/:id', 'App\Controllers\Admin\AdminTargetController@delete');
$router->get('admin/targets/edit/:id', 'App\Controllers\Admin\AdminTargetController@edit');
$router->post('admin/targets/edit/:id', 'App\Controllers\Admin\AdminTargetController@update');

//====== Admin/Hideouts======
$router->get('/admin/hideouts', 'App\Controllers\Admin\AdminHideoutController@index');
$router->get('/admin/hideouts/create', 'App\Controllers\Admin\AdminHideoutController@create');
$router->post('/admin/hideouts/create', 'App\Controllers\Admin\AdminHideoutController@createHideout');
$router->post('admin/hideouts/delete/:id', 'App\Controllers\Admin\AdminHideoutController@delete');
$router->get('admin/hideouts/edit/:id', 'App\Controllers\Admin\AdminHideoutController@edit');
$router->post('admin/hideouts/edit/:id', 'App\Controllers\Admin\AdminHideoutController@update');



try {
    $router->run();
} catch (NotFoundException $e) {
    $e->errorNotFound();
}
