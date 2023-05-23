<?php
require __DIR__."/../app/TEMPORARY/pdo.php";
require __DIR__."/../app/Classes/Event.php";
require __DIR__."/../app/Controllers/MainController.php";
require __DIR__."/../vendor/autoload.php";

// $routes = [
//     '/' => [
//         'controller' => 'MainController',
//         'method' => 'calendrier'
//     ],
//     '/meteo' => [
//         'controller' => 'MainController',
//         'method' => 'meteo'
//     ],
//     '/live' => [
//         'controller' => 'MainCOntroller',
//         'method' => 'live'
//     ],
//     '/admin' => [
//         'controller' => 'MainController',
//         'method' => 'admin'
//     ],
// ];

$router = new AltoRouter();

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
dump($match);
if($match) {
    $controllerToUse = $match['target']['controller'];
    $methodToUse = $match['target']['method'];

    $controller = new $controllerToUse();
    $controller->$methodToUse();
} else {
    exit('404 not found');
}

// $view = isset($_GET['page']) ? $_GET['page'] : '/';

// if (isset($routes[$view])) {
//     $controller = $routes[$view]['controller'];
//     $controllerObject = new $controller();

//     $method = $routes[$view]['method'];
//     $controllerObject->$method();
// }
?>