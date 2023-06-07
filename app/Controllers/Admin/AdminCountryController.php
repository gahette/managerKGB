<?php

namespace App\Controllers\Admin;

use App\Models\Agent;
use App\Models\Contact;
use App\Models\Country;
use App\Models\Hideout;
use App\Models\Mission;
use App\Models\Speciality;
use App\Models\Status;
use App\Models\Target;
use App\Models\TypeMission;

class AdminCountryController extends \App\Controllers\Controller
{
    public function index()
    {
        $countries = (new Country($this->getDB()))->all("" );

        $this->view('admin.country.index', compact('countries'));
    }
    public function create()
    {
        $this->view('admin.country.form');
    }

    public function createCountry()
    {
        $country = new Country($this->getDB());

          $result = $country->create($_POST);

        if ($result) {
            header('Location: /managerKGB/admin/countries');
            exit;
        }
    }
    public function edit(int $id)
    {
        $country = (new Country($this->getDB()))->findById($id);


        $this->view('admin.country.form', compact(
            'country'));
    }

    public function update(int $id)
    {
        $country = new Country($this->getDB());

          $result = $country->update($id, $_POST);

        if ($result) {
            header('Location: /managerKGB/admin/countries');
            exit;
        }
    }

    public function delete(int $id)
    {
        $country = new Country($this->getDB());
        $result = $country->delete($id);

        if ($result) {
            header('Location: /managerKGB/admin/countries');
            exit;
        }
    }
}