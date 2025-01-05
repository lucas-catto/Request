<?php

class Request
{
    public function all($show = false)
    {
        if ($show) {
            return pre_r($_REQUEST);
        }
        
        return $_REQUEST;
    }

    /*
     * Magic method
     */
    public function __get($name)
    {
        return $_POST[$name];
    }
}
