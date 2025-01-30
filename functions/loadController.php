<?php

function loadController($controller, $method) {

    $controllerPath = "Controllers/{$controller}.php";

    if (file_exists($controllerPath)) {

        require_once($controllerPath);

        if (class_exists($controller)) {

            $controller = new $controller();

            if (method_exists($controller, $method)) {

                // $class = new ReflectionClass($controller);                
                
                $controller->$method(new Request);
            } else {
                message($message = "Method doesn't exists.");
            }
        } else {
            message($message = "Controller Class doesn't exists.");
        }
    } else {
        message($message = "Controller file doesn't exists.");
    }
}
