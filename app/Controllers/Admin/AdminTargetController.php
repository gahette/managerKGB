<?php

namespace App\Controllers\Admin;

use App\Controllers\Controller;
use App\Exceptions\NotFoundException;
use App\Models\Country;
use App\Models\Target;
use Exception;

class AdminTargetController extends Controller
{
    /**
     * @throws Exception
     */
    public function index()
    {
        $targets = (new Target($this->getDB()))->all("");

        $this->view('admin.target.index', compact('targets'));
    }

    public function create()
    {
        $countries = (new Country($this->getDB()))->allEdit();

        $this->view('admin.target.form', compact(
            'countries'
        ));
    }

    /**
     * @throws Exception
     */
    public function createTarget()
    {
        $target = new Target($this->getDB());
        $countries = array_pop($_POST);

//dd($specialities, $countries);
        $result = $target->createNewTarget($_POST, $countries);

        if ($result) {
            header('Location: /managerKGB/admin/targets');
            exit;
        }
    }

    /**
     * @throws NotFoundException
     */
    public function edit(int $id)
    {
        $target = (new Target($this->getDB()))->findById($id);

        $countries = (new Country($this->getDB()))->allEdit();

        $this->view('admin.target.form', compact(
            'target',
            'countries'
        ));
    }
    /**
     * @throws Exception
     */
    public function update(int $id)
    {
        $target = new Target($this->getDB());

        $countries = array_pop($_POST);

//dd($countries, $specialities);
        $result = $target->updateTarget($id, $_POST, $countries );

        if ($result) {
            header('Location: /managerKGB/admin/targets');
            exit;
        }
    }

    public function delete(int $id)
    {
        $target = new Target($this->getDB());
        $result = $target->delete($id);

        if ($result) {
            header('Location: /managerKGB/admin/targets');
            exit;
        }
    }
}