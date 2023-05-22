<?php
require __DIR__."/../app/TEMPORARY/pdo.php";
require __DIR__."/../app/Classes/Event.php";
require __DIR__."/../app/Controllers/MainController.php";

$routes = [
    '/' => [
        'controller' => 'MainController',
        'method' => 'calendrier'
    ],
    '/meteo' => [
        'controller' => 'MainController',
        'method' => 'meteo'
    ],
    '/live' => [
        'controller' => 'MainCOntroller',
        'method' => 'live'
    ],
    '/admin' => [
        'controller' => 'MainController',
        'method' => 'admin'
    ],
];

$view = isset($_GET['page']) ? $_GET['page'] : '/';

if (isset($routes[$view])) {
    $controller = $routes[$view]['controller'];
    $controllerObject = new $controller();

    $method = $routes[$view]['method'];
    $controllerObject->$method();
}
?>