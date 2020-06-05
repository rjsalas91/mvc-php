<?php

namespace App\Controllers;

use Core\View;

class Error
{
    public function index()
    {
    }

    public function pageNotFound()
    {
        http_response_code(404);
        View::render(['error/404']);
    }
}
