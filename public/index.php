<?php
// je charge mon autoload
require_once('../vendor/autoload.php');
// je démarre une session afin d'y stocker les informations pour un utilisateur connecté (admin)
session_start();

use App\Controllers\MainController;
use App\Controllers\SpringController;
use App\Controllers\FallController;
use App\Controllers\AppUserController;
use App\Controllers\TeamController;

$router = new AltoRouter;

if (array_key_exists('BASE_URI', $_SERVER)) {

    $router->setBasePath($_SERVER['BASE_URI']);

} else { 

    $_SERVER['BASE_URI'] = '/';
}

//--------------------------- routes principales ----------------------//
$router->map(
    'GET',
    '/',
    [
        'controller' => MainController::class,
        'method' => 'home'
    ],
    'main-home'
);

$router->map(
    'GET',
    '/calendrier',
    [
        'controller' => MainController::class,
        'method' => 'calendrier'   
    ],
    'main-calendar'
);

$router->map(
    'GET',
    '/classement',
    [
        'controller' => MainController::class,
        'method' => 'classement'   
    ],
    'main-standings'
);

$router->map(
    'GET',
    '/line-up',
    [
        'controller' => MainController::class,
        'method' => 'lineUp'   
    ],
    'main-line_up'
);

$router->map(
    'GET',
    '/meteo',
    [
        'controller' => MainController::class,
        'method'  => 'meteo'
    ],
    'main-meteo'
);

$router->map(
    'GET',
    '/live',
    [
        'controller' => MainController::class,
        'method'  => 'live'
    ],
    'main-live'
);

//-----------------------------routes calendrier spring------------------------------------------

$router->map(
    'GET',
    '/admin/spring',
    [
        'controller' => MainController::class,
        'method'  => 'spring'
    ],
    'admin-spring'
);

$router->map(
    'POST',
    '/admin/spring',
    [
        'controller' => SpringController::class,
        'method'  => 'create'
    ],
    'spring-create'
);

$router->map(
    'GET',
    '/spring/update/[i:id]',
    [
        'controller' => SpringController::class,
        'method'  => 'edit'
    ],
    'spring-edit'
);

$router->map(
    'POST',
    '/spring/update/[i:id]',
    [
        'controller' => SpringController::class,
        'method'  => 'create'
    ],
    'spring-update'
);

$router->map(
    'GET',
    '/spring/remove/[i:id]',
    [
        'controller' => SpringController::class,
        'method'  => 'remove'
    ],
    'spring-remove'
);

//-----------------------------routes calendrier fall--------------------------------------------

$router->map(
    'GET',
    '/admin/fall',
    [
        'controller' => MainController::class,
        'method'  => 'fall'
    ],
    'admin-fall'
);

$router->map(
    'POST',
    '/admin/fall',
    [
        'controller' => FallController::class,
        'method'  => 'create'
    ],
    'fall-create'
);

$router->map(
    'GET',
    '/fall/update/[i:id]',
    [
        'controller' => FallController::class,
        'method'  => 'edit'
    ],
    'fall-edit'
);

$router->map(
    'POST',
    '/fall/update/[i:id]',
    [
        'controller' => FallController::class,
        'method'  => 'create'
    ],
    'fall-update'
);

$router->map(
    'GET',
    '/fall/remove/[i:id]',
    [
        'controller' => FallController::class,
        'method'  => 'remove'
    ],
    'fall-remove'
);

//-----------------------routes appuser----------------

$router->map(
    'GET',
    '/appuser/login',
    [
        'controller' => AppUserController::class,
        'method' => 'login'
    ],
    'appuser-login'
);

$router->map(
    'GET',
    '/appuser/logout',
    [
        'controller' => AppUserController::class,
        'method' => 'logout'
    ],
    'appuser-logout'
);

$router->map(
    'POST',
    '/appuser/login',
    [
        'controller' => AppUserController::class,
        'method' => 'validate'
    ],
    'appuser-validate'
);

$router->map(
    'GET',
    '/appuser/list',
    [
        'controller' => AppUSerController::class,
        'method' => 'list'
    ],
    'appuser-list'
);

$router->map(
    'GET',
    '/appuser/remove/[i:id]',
    [
        'controller' => AppUSerController::class,
        'method' => 'remove'
    ],
    'appuser-remove'
);

$router->map(
    'GET',
    '/appuser/add',
    [
        'controller' => AppUSerController::class,
        'method' => 'add'
    ],
    'appuser-add'
);

$router->map(
    'POST',
    '/appuser/add',
    [
        'controller' => AppUSerController::class,
        'method' => 'create'
    ],
    'appuser-create'
);

$router->map(
    'GET',
    '/appuser/update/[i:id]',
    [
        'controller' => AppUSerController::class,
        'method' => 'edit'
    ],
    'appuser-edit'
);

$router->map(
    'POST',
    '/appuser/update/[i:id]',
    [
        'controller' => AppUSerController::class,
        'method' => 'create'
    ],
    'appuser-update'
);

$router->map(
    'GET',
    '/appuser/line-up',
    [
        'controller' => AppUSerController::class,
        'method' => 'generate'
    ],
    'appuser-generate'
);

//------------------routes team----------------

$router->map(
    'GET',
    '/team/add',
    [
        'controller' => TeamController::class,
        'method' => 'add'
    ],
    'team-add'
);

$router->map(
    'POST',
    '/team/add',
    [
        'controller' => TeamController::class,
        'method' => 'create'
    ],
    'team-create'
);

$router->map(
    'GET',
    '/team/update/[i:id]',
    [
        'controller' => TeamController::class,
        'method' => 'edit'
    ],
    'team-edit'
);

$router->map(
    'POST',
    '/team/update/[i:id]',
    [
        'controller' => TeamController::class,
        'method' => 'create'
    ],
    'team-update'
);

$router->map(
    'GET',
    '/team/remove/[i:id]',
    [
        'controller' => TeamController::class,
        'method' => 'remove'
    ],
    'team-remove'
);


$match = $router->match();

$dispatcher = new Dispatcher($match, '\App\Controllers\ErrorController::err404');
// je passe $router et $match en arguments de mes controlleurs
$dispatcher->setControllersArguments($router, $match);

$dispatcher->dispatch();

?>