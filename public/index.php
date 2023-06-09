<?php

require_once('../vendor/autoload.php');

use App\Controllers\MainController;
use App\Controllers\AdminController;
use App\Controllers\CalendarController;

$router = new AltoRouter;

if (array_key_exists('BASE_URI', $_SERVER)) {

    $router->setBasePath($_SERVER['BASE_URI']);

} else { 

    $_SERVER['BASE_URI'] = '/';
}

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
    '/admin',
    [
        'controller' => MainController::class,
        'method'  => 'admin'
    ],
    'main-admin'
);

$router->map(
    'POST',
    '/admin',
    [
        'controller' => CalendarController::class,
        'method'  => 'create'
    ],
    'admin-create'
);

$router->map(
    'GET',
    '/admin/update/[i:id]',
    [
        'controller' => CalendarController::class,
        'method'  => 'edit'
    ],
    'admin-edit'
);

$router->map(
    'POST',
    '/admin/update/[i:id]',
    [
        'controller' => CalendarController::class,
        'method'  => 'create'
    ],
    'admin-update'
);

$router->map(
    'POST',
    '/admin/remove',
    [
        'controller' => CalendarController::class,
        'method'  => 'remove'
    ],
    'admin-remove'
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

$match = $router->match();
// dump($match);

$dispatcher = new Dispatcher($match, '\App\Controllers\ErrorController::err404');

$dispatcher->dispatch();

?>