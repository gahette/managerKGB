<?php

namespace App\Controllers;

use App\Models\Hideout;

class HideoutController extends Controller
{
    public function index()
    {
        $this->isAdmin();

        $hideout = new Hideout($this->getDB());
        $hideouts = $hideout->all("");

        $this->view('hideout.index', compact('hideouts'));
    }
}