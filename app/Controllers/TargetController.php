<?php

namespace App\Controllers;

use App\Models\Target;
use Exception;

class TargetController extends Controller
{
    /**
     * @throws Exception
     */
    public function index()
    {
        $this->isAdmin();

        $target = new Target($this->getDB());
        $targets = $target->all("");

        $this->view('target.index', compact('targets'));
    }
}