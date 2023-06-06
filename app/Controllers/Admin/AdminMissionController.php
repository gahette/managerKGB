<?php

namespace App\Controllers\Admin;

use App\Controllers\Controller;
use App\Models\Agent;
use App\Models\Contact;
use App\Models\Country;
use App\Models\Hideout;
use App\Models\Mission;
use App\Models\Speciality;
use App\Models\Status;
use App\Models\Target;
use App\Models\TypeMission;
use Exception;

class AdminMissionController extends Controller
{
    public function index()
    {
        $missions = (new Mission($this->getDB()))->all("created_at" . " DESC");

        $this->view('admin.mission.index', compact('missions'));
    }

    public function create()
    {
        $status = (new Status($this->getDB()))->allEdit();
        $countries = (new Country($this->getDB()))->allEdit();
        $typesMissions = (new TypeMission($this->getDB()))->allEdit();
        $specialities = (new Speciality($this->getDB()))->allEdit();
        $agents = (new Agent($this->getDB()))->allEdit();
        $targets = (new Target($this->getDB()))->allEdit();
        $contacts = (new Contact($this->getDB()))->allEdit();
        $hideouts = (new Hideout($this->getDB()))->allEdit();

        $this->view('admin.mission.form', compact(
            'status',
            'countries',
            'typesMissions',
            'specialities',
            'agents',
            'targets',
            'contacts',
            'hideouts'
        ));
    }

    public function createMission()
    {
        $mission = new Mission($this->getDB());

        $hideouts = array_pop($_POST);
        $contacts = array_pop($_POST);
        $targets = array_pop($_POST);
        $agents = array_pop($_POST);
        $typesMissions = array_pop($_POST);
        $specialities = array_pop($_POST);
        $countries = array_pop($_POST);
        $status = array_pop($_POST);

        $result = $mission->create($_POST, $status, $countries, $typesMissions, $specialities, $agents, $targets, $contacts, $hideouts);

        if ($result) {
            header('Location: /managerKGB/admin/missions');
            exit;
        }
    }

    public function edit(int $id)
    {
        $mission = (new Mission($this->getDB()))->findById($id);

        $status = (new Status($this->getDB()))->allEdit();
        $countries = (new Country($this->getDB()))->allEdit();
        $typesMissions = (new TypeMission($this->getDB()))->allEdit();
        $specialities = (new Speciality($this->getDB()))->allEdit();
        $agents = (new Agent($this->getDB()))->allEdit();
        $targets = (new Target($this->getDB()))->allEdit();
        $contacts = (new Contact($this->getDB()))->allEdit();
        $hideouts = (new Hideout($this->getDB()))->allEdit();

        $this->view('admin.mission.form', compact(
            'mission',
            'status',
            'countries',
            'typesMissions',
            'specialities',
            'agents',
            'targets',
            'contacts',
            'hideouts'
        ));
    }

    /**
     * @throws Exception
     */
    public function update(int $id)
    {
        $mission = new Mission($this->getDB());

        $hideouts = array_pop($_POST);
        $contacts = array_pop($_POST);
        $targets = array_pop($_POST);
        $agents = array_pop($_POST);
        $specialities = array_pop($_POST);
        $typesMissions = array_pop($_POST);
        $countries = array_pop($_POST);
        $status = array_pop($_POST);

//dd($countries, $status, $specialities);
        $result = $mission->update($id, $_POST, $status, $countries, $typesMissions, $specialities, $agents, $targets, $contacts, $hideouts);

        if ($result) {
            header('Location: /managerKGB/admin/missions');
            exit;
        }
    }

    public function delete(int $id)
    {
        $mission = new Mission($this->getDB());
        $result = $mission->delete($id);

        if ($result) {
            header('Location: /managerKGB/admin/missions');
            exit;
        }
    }

}