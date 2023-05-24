<?php

namespace App\Controllers;
class MissionController extends Controller
{
    public function index()
    {
        $this->view('mission.index');
    }

    public function show(int $id)
    {
        $this->view('mission.show', compact('id'));
    }
}