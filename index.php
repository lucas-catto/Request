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
    '/' => setRoute('HomeController', 'index'),
    '/php' => setRoute('HomeController', 'php')
];

if (array_key_exists($uri, $routes)) {
    loadController($routes[$uri]['controller'], $routes[$uri]['method']);
} else {
    $error = "404";
    view('error.php', compact('error'));
}
