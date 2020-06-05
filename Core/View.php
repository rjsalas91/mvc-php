<?php

namespace Core;

use Exception;

class View
{
    public static function render($views = [], $args = [], $header = 'templates/header', $footer = 'templates/footer')
    {
        $baseUrl = Util::baseUrl();
        extract($args, EXTR_SKIP);

        $file = APP."Views/$header.php";
        if (is_readable($file)) {
            require $file;
        } else {
            throw new Exception("$file not found");
        }

        foreach ($views as $view) {
            $file = APP."Views/$view.php";

            if (is_readable($file)) {
                require $file;
            } else {
                throw new Exception("$file not found");
            }
        }

        $file = APP."Views/$footer.php";
        if (is_readable($file)) {
            require $file;
        } else {
            throw new Exception("$file not found");
        }
    }
}
