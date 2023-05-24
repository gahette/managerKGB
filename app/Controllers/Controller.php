<?php

namespace App\Controllers;

class Controller
{
    protected function view(string $path, array $params = null)
    {

        ob_start();
        $path = str_replace('.', DIRECTORY_SEPARATOR, $path);
        require VIEWS . $path . '.php';
        $content = ob_get_clean();
        $layout = 'layouts/default';
        require VIEWS . DIRECTORY_SEPARATOR . $layout . '.php';
    }
}