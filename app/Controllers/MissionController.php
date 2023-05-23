<?php

namespace App\Controllers;
class MissionController
{
    public function index()
    {
        echo 'je suis la page des missions';
    }

    public function show(int $id)
    {
        echo 'je suis la mission ' . $id;
    }
}