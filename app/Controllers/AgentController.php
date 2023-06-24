<?php

namespace App\Controllers;

use App\Models\Agent;
use App\Models\Country;

class AgentController extends Controller
{
    public function index()
    {
        $this->isAdmin();

        $agent = new Agent($this->getDB());
        $agents = $agent->all("");

        $this->view('agent.index', compact('agents'));
    }
}