<?php

define('ROOT', dirname(__DIR__).DIRECTORY_SEPARATOR);
define('APP', ROOT.'App'.DIRECTORY_SEPARATOR);
define('VIEWS', APP.'Views'.DIRECTORY_SEPARATOR);
define('PUBLIC_FOLDER', 'public');
define('PUBLIC_FOLDER_PATH', ROOT.PUBLIC_FOLDER.DIRECTORY_SEPARATOR);

require ROOT.'vendor/autoload.php';

use Core\Router;

$router = new Router();
