<?php
require __DIR__."/../vendor/autoload.php";
require __DIR__."/../app/Utils/Database.php";
require __DIR__."/../app/Controllers/MainController.php";
require __DIR__."/../app/Models/SpringSeason.php";
require __DIR__."/../app/Models/FallSeason.php";



$router = new AltoRouter;

$router->setBasePath($_SERVER['BASE_URI']);

$router->map(
    'GET',
    '/',
    [
        'controller' => 'MainController',
        'method' => 'home'
    ]
);

$router->map(
    'GET',
    '/calendrier',
    [
        'controller' => 'MainController',
        'method' => 'calendrier'   
    ]
);

$router->map(
    'GET',
    '/admin',
    [
        'controller' => 'MainController',
        'method'  => 'admin'
    ]
);

$router->map(
    'GET',
    '/meteo',
    [
        'controller' => 'MainController',
        'method'  => 'meteo'
    ]
);

$router->map(
    'GET',
    '/live',
    [
        'controller' => 'MainController',
        'method'  => 'live'
    ]
);

$match = $router->match();
// dump($match);
if($match) {
    $controllerToUse = $match['target']['controller'];
    $methodToUse = $match['target']['method'];

    $controller = new $controllerToUse();
    $controller->$methodToUse();
} else {
    exit('404 page not found');
}
?>