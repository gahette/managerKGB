<?php

namespace App\Controllers;

use App\Models\Agent;
use Exception;


class AgentController extends Controller
{
    /**
     * @throws Exception
     */
    public function index()
    {
        $this->isAdmin();

        $agent = new Agent($this->getDB());
        $agents = $agent->all("");

        $this->view('agent.index', compact('agents'));
    }
}