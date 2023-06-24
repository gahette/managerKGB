<?php

namespace App\Controllers\Admin;

use App\Controllers\Controller;
use App\Exceptions\NotFoundException;
use App\Models\Country;
use Exception;


class AdminCountryController extends Controller
{
    /**
     * @throws Exception
     */
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

    /**
     * @throws NotFoundException
     */
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