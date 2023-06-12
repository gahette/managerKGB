<?php

namespace App\Controllers\Admin;

use App\Controllers\Controller;
use App\Models\Agent;
use App\Models\Country;
use App\Models\Speciality;
use Exception;


class AdminAgentController extends Controller
{
    /**
     * @throws Exception
     */
    public function index()
    {
        $agents = (new Agent($this->getDB()))->all("");

        $this->view('admin.agent.index', compact('agents'));
    }

    public function create()
    {
        $countries = (new Country($this->getDB()))->allEdit();
        $specialities = (new Speciality($this->getDB()))->allEdit();

        $this->view('admin.agent.form', compact(
            'countries',
            'specialities'
        ));
    }

    /**
     * @throws Exception
     */
    public function createAgent()
    {
        $agent = new Agent($this->getDB());
        $specialities = array_pop($_POST);
        $countries = array_pop($_POST);




//dd($specialities, $countries);
        $result = $agent->createNewAgent($_POST, $countries, $specialities);

        if ($result) {
            header('Location: /managerKGB/admin/agents');
            exit;
        }
    }
    public function edit(int $id)
    {
        $agent = (new Agent($this->getDB()))->findById($id);

        $countries = (new Country($this->getDB()))->allEdit();
        $specialities = (new Speciality($this->getDB()))->allEdit();

        $this->view('admin.agent.form', compact(
            'agent',
            'countries',
            'specialities',
        ));
    }
    /**
     * @throws Exception
     */
    public function update(int $id)
    {
        $agent = new Agent($this->getDB());

        $specialities = array_pop($_POST);
        $countries = array_pop($_POST);

//dd($countries, $specialities);
        $result = $agent->updateAgent($id, $_POST, $countries, $specialities );

        if ($result) {
            header('Location: /managerKGB/admin/agents');
            exit;
        }
    }

    public function delete(int $id)
    {
        $agent = new Agent($this->getDB());
        $result = $agent->delete($id);

        if ($result) {
            header('Location: /managerKGB/admin/agents');
            exit;
        }
    }
}