<?php

namespace App\Controllers\Admin;

use App\Controllers\Controller;
use App\Models\Agent;
use App\Models\Country;
use App\Models\Hideout;
use App\Models\Speciality;
use App\Models\TypeHideout;
use Exception;

class AdminHideoutController extends Controller
{
    public function index()
    {
        $hideouts = (new Hideout($this->getDB()))->all("");

        $this->view('admin.hideout.index', compact('hideouts'));
    }

    public function create()
    {
        $countries = (new Country($this->getDB()))->allEdit();
        $typesHideouts = (new TypeHideout($this->getDB()))->allEdit();

        $this->view('admin.hideout.form', compact(
            'countries',
            'typesHideouts'
        ));
    }

    /**
     * @throws Exception
     */
    public function createHideout()
    {
        $hideout = new Hideout($this->getDB());
        $typesHideouts = array_pop($_POST);
        $countries = array_pop($_POST);




//dd($specialities, $countries);
        $result = $hideout->createNewHideout($_POST, $countries, $typesHideouts);

        if ($result) {
            header('Location: /managerKGB/admin/hideouts');
            exit;
        }
    }
    public function edit(int $id)
    {
        $hideout = (new Hideout($this->getDB()))->findById($id);

        $countries = (new Country($this->getDB()))->allEdit();
        $typesHideouts = (new TypeHideout($this->getDB()))->allEdit();

        $this->view('admin.hideout.form', compact(
            'hideout',
            'countries',
            'typesHideouts',
        ));
    }

    public function update(int $id)
    {
        $hideout = new Hideout($this->getDB());

        $typesHideouts = array_pop($_POST);
        $countries = array_pop($_POST);

//dd($countries, $specialities);
        $result = $hideout->updateHideout($id, $_POST, $countries, $typesHideouts );

        if ($result) {
            header('Location: /managerKGB/admin/hideouts');
            exit;
        }
    }
    public function delete(int $id)
    {
        $hideout = new Hideout($this->getDB());
        $result = $hideout->delete($id);

        if ($result) {
            header('Location: /managerKGB/admin/hideouts');
            exit;
        }
    }
}