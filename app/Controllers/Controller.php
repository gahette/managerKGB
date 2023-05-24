<?php

namespace App\Controllers;

use Database\DBConnection;

class Controller
{

    protected DBConnection $db;
    public function __construct(DBConnection $db)
    {
//        if (session_status() === PHP_SESSION_NONE) {
//            session_start();
//        }

        $this->db = $db;
    }
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