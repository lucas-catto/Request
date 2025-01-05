<?php

function message($message = "", $type = "Error") {
    
    die("{$type}: {$message}");
}
