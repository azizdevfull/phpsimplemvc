<?php

require_once 'controllers/UserController.php';
require_once 'controllers/BookController.php';
require_once 'controllers/HomeController.php';

$routes = [
    '/' => [
        'controller' => 'HomeController',
        'method' => 'index',
    ],
    '/users' => [
        'controller' => 'UserController',
        'method' => 'index'
    ],
    '/users/view' => [
        'controller' => 'UserController',
        'method' => 'show'
    ],
    '/users/create' => [
        'controller' => 'UserController',
        'method' => 'create'
    ],
    '/users/store' => [
        'controller' => 'UserController',
        'method' => 'store'
    ],
    '/books' => [
        'controller' => 'BookController',
        'method' => 'index'
    ],
    '/books/view' => [
        'controller' => 'BookController',
        'method' => 'view'
    ]
];

// Get the incoming url e.g www.example.com/user [/user]
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); //    /users
$route = $routes[$url];

if ($route) {
    $controller = new $route['controller'](); // new UserController()
    $method = $route['method']; // index
    $controller->$method(); // $controller->index()
} else {
    header("HTTP/1.0 404 Not Found");
    echo "404 Not Found";
}


