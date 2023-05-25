<?php

namespace App\Controllers;

use App\Models\Mission;

class MissionController extends Controller
{
    public function index()
    {
        $mission = new Mission($this->getDB());
        $missions = $mission->all();

        $this->view('mission.index', compact('missions'));
    }

    public function show(int $id)
    {
        $mission = new Mission($this->getDB());
        $mission = $mission->findByID($id);

        $this->view('mission.show', compact('mission'));
    }
}