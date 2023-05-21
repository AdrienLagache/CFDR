<?php
require __DIR__."/inc/pdo.php";
require __DIR__."/Classes/Event.php";
require __DIR__."/Classes/MainController.php";

$routes = [
'/' => [
    'controller' => 'MainController',
    'method' => 'calendrier'
],
'/meteo' => [
    'controller' => 'MainController',
    'method' => 'meteo'
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