<?php

namespace App\Controllers;

use App\Models\Country;

class CountryController extends Controller
{
    public function index()
    {
        $this->isAdmin();

        $country = new Country($this->getDB());
        $countries = $country->all("");

        $this->view('country.index', compact('countries'));
    }
}