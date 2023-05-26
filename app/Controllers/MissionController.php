<?php

namespace App\Controllers;

use App\Models\Agent;
use App\Models\Country;
use App\Models\Mission;

class MissionController extends Controller
{
    public function index()
    {
        $mission = new Mission($this->getDB());
        $missions = $mission->all("created_at" . " DESC");

        $this->view('mission.index', compact('missions'));
    }

    public function show(int $id)
    {
        $mission = new Mission($this->getDB());
        $mission = $mission->findByID($id);

        $this->view('mission.show', compact('mission'));
    }

    public function country(int $id)
    {
        $country = (new Country($this->getDB()))->findById($id);
        $this->view('mission.country', compact('country'));
    }

    public function agent(int $id)
    {
        $agent = (new Agent($this->getDB()))->findById($id);
        $this->view('mission.agent', compact('agent'));
    }
}