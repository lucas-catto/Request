<?php

require_once 'Request.php';

class HomeController
{
    public function index()
    {
        return view('index.html');
    }

    public function php(Request $request) {
        
        echo $request->title;
        echo $request->content;

        $request->all(true);
    }
}
