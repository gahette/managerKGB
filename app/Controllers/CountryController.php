<?php

namespace App\Controllers;

use App\Models\Country;
use App\Models\Mission;

class CountryController extends Controller
{
    public function index()
    {
        $country = new Country($this->getDB());
        $countries = $country->all("");

        $this->view('country.index', compact('countries'));
    }

    public function show(int $id)
    {
        $country = new Country($this->getDB());
        $country = $country->findById($id);

        $this->view('country.show', compact('country'));
    }
}