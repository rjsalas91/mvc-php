<?php

define('ROOT', dirname(__DIR__).DIRECTORY_SEPARATOR);
define('APP', ROOT.'App'.DIRECTORY_SEPARATOR);

require ROOT.'vendor/autoload.php';

use Core\Router;

$router = new Router();
