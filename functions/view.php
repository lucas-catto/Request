<?php

function view($view, array $data = []) {

    $viewPath = "Views/{$view}";

    if (file_exists($viewPath)) { // try file_exists .php - .html (inside both code (the same))
        
        extract($data);

        return require_once $viewPath;
    }

    return message($message = "View file not found.");
}
