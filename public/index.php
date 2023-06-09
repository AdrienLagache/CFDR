<?php

require_once('../vendor/autoload.php');

use App\Controllers\MainController;
use App\Controllers\SpringController;
use App\Controllers\FallController;
use App\Controllers\CalendarController;

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
    '/admin/spring',
    [
        'controller' => MainController::class,
        'method'  => 'spring'
    ],
    'admin-spring'
);

$router->map(
    'GET',
    '/admin/fall',
    [
        'controller' => MainController::class,
        'method'  => 'fall'
    ],
    'admin-fall'
);

//-----------------------------routes calendrier spring------------------------------------------

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

//--------------------------------------

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

$match = $router->match();
// dump($match);

$dispatcher = new Dispatcher($match, '\App\Controllers\ErrorController::err404');

$dispatcher->dispatch();

?>