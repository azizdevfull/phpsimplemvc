<?php

require_once 'controllers/UserController.php';
require_once 'controllers/BookController.php';

$routes = [
    '/user' => [
        'controller' => 'UserController',
        'method' => 'index'
    ],
    '/user/view' => [
        'controller' => 'UserController',
        'method' => 'view'
    ],
    '/user/add' => [
        'controller' => 'UserController',
        'method' => 'add'
    ],
    '/user/insert' => [
        'controller' => 'UserController',
        'method' => 'insert'
    ],
    '/book' => [
        'controller' => 'BookController',
        'method' => 'index'
    ],
    '/book/view' => [
        'controller' => 'BookController',
        'method' => 'view'
    ]
];

// Get the incoming url e.g www.example.com/user [/user]
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); //    /user
$route = $routes[$url]; 

if($route) {
    $controller = new $route['controller'](); // new UserController()
    $method = $route['method']; // index
    $controller->$method(); // $controller->index()
}else{
    header("HTTP/1.0 404 Not Found");
    echo "404 Not Found";
}


