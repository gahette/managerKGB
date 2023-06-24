<?php

namespace App\Controllers\Admin;

use App\Controllers\Controller;
use App\Exceptions\NotFoundException;
use App\Models\Speciality;
use Exception;

class AdminSpecialityController extends Controller
{
    /**
     * @throws Exception
     */
    public function index()
    {
        $specialities = (new Speciality($this->getDB()))->all("" );

        $this->view('admin.speciality.index', compact('specialities'));
    }
    public function create()
    {
        $this->view('admin.speciality.form');
    }

    public function createSpeciality()
    {
        $speciality = new Speciality($this->getDB());

        $result = $speciality->create($_POST);

        if ($result) {
            header('Location: /managerKGB/admin/specialities');
            exit;
        }
    }

    /**
     * @throws NotFoundException
     */
    public function edit(int $id)
    {
        $speciality = (new Speciality($this->getDB()))->findById($id);


        $this->view('admin.speciality.form', compact(
            'speciality'));
    }

    public function update(int $id)
    {
        $speciality = new Speciality($this->getDB());

        $result = $speciality->update($id, $_POST);

        if ($result) {
            header('Location: /managerKGB/admin/specialities');
            exit;
        }
    }

    public function delete(int $id)
    {
        $speciality = new Speciality($this->getDB());
        $result = $speciality->delete($id);

        if ($result) {
            header('Location: /managerKGB/admin/specialities');
            exit;
        }
    }
}