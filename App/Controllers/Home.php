<?php

namespace App\Controllers;

use Core\View;

class Home
{
    public function index()
    {
        $views = ['home/index'];
        $args  = ['title' => 'Home'];
        View::render($views, $args);
    }

    public function example()
    {
        $views = ['home/example'];
        $args  = ['title' => 'Home | Example'];
        View::render($views, $args);
    }

    public function exampleWithArgs($id = null)
    {
        $views = ['home/example_with_args'];
        $args  = [
            'title' => 'Home | Example',
            'id' => $id ?? 'No se envio ID'
        ];
        View::render($views, $args);
    }
}
