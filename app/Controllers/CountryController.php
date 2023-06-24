<?php

namespace App\Controllers;

use App\Models\Country;
use Exception;

class CountryController extends Controller
{
    /**
     * @throws Exception
     */
    public function index()
    {
        $this->isAdmin();

        $country = new Country($this->getDB());
        $countries = $country->all("");

        $this->view('country.index', compact('countries'));
    }
}