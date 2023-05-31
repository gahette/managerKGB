<?php

namespace App\Controllers;

use App\Models\Contact;
use App\Models\Target;

class TargetController extends Controller
{
    public function index()
    {
        $target = new Target($this->getDB());
        $targets = $target->all("");

        $this->view('target.index', compact('targets'));
    }
}