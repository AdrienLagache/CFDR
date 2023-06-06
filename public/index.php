<?php

require_once('../vendor/autoload.php');

use App\Controllers\MainController;



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
    ]
);

$router->map(
    'GET',
    '/calendrier',
    [
        'controller' => MainController::class,
        'method' => 'calendrier'   
    ]
);

$router->map(
    'GET',
    '/admin',
    [
        'controller' => MainController::class,
        'method'  => 'admin'
    ]
);

$router->map(
    'POST',
    '/admin',
    [
        'controller' => 'MainController',
        'method'  => 'create'
    ]
);

$router->map(
    'GET',
    '/meteo',
    [
        'controller' => MainController::class,
        'method'  => 'meteo'
    ]
);

$router->map(
    'GET',
    '/live',
    [
        'controller' => MainController::class,
        'method'  => 'live'
    ]
);

$match = $router->match();
// dump($match);

$dispatcher = new Dispatcher($match, '\App\Controllers\ErrorController::err404');
$dispatcher->dispatch();
// if($match) {
//     $controllerToUse = 'App\\Controllers\\'.$match['target']['controller'];
//     $methodToUse = $match['target']['method'];

//     $controller = new $controllerToUse();
//     $controller->$methodToUse();
// } else {
//     exit('404 page not found');
// }
?>