<?php

/*
echo "<pre>";
print_r($_SERVER);
echo "</pre>";

die();
*/

require "Request.php";

/*
 * load all functions from /functions
 */
$functions = glob("functions/*.php");

foreach ($functions as $function) {
    require_once $function;
}

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$routes = [
    '/' => 'HomeController@index',
    '/php' => 'HomeController@php'
];

/*
$routes = [
    '/' => setRoute('HomeController', 'index')
];

function setRoute($controller, $method) {
    
    return [
        'controller' => $controller,
        'method' => $method
    ];
}

// then

function setRoute($controller, $method, $middlewares = []) {
    
    return [
        'controller' => $controller,
        'method' => $method
    ];
}

*/

if (array_key_exists($uri, $routes)) {
    loadController($routes[$uri]);
} else {
    $error = "404";
    view('error.php', compact('error'));
}
