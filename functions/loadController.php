<?php

function loadController($controllerMethod) {

    $controllerMethod = explode('@', $controllerMethod);

    $controllerClass = $controllerMethod[0];
    $method = $controllerMethod[1];

    $controllerPath = "Controllers/{$controllerClass}.php";

    if (file_exists($controllerPath)) {

        require_once($controllerPath);

        if (class_exists($controllerClass)) {

            $controller = new $controllerClass();

            if (method_exists($controller, $method)) {
                
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