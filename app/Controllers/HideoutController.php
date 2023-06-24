<?php

namespace App\Controllers;

use App\Models\Hideout;
use Exception;

class HideoutController extends Controller
{
    /**
     * @throws Exception
     */
    public function index()
    {
        $this->isAdmin();

        $hideout = new Hideout($this->getDB());
        $hideouts = $hideout->all("");

        $this->view('hideout.index', compact('hideouts'));
    }
}