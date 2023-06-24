<?php

namespace App\Controllers\Admin;

use App\Controllers\Controller;
use App\Exceptions\NotFoundException;
use App\Models\TypeMission;
use Exception;

class AdminTypeMissionController extends Controller
{
    /**
     * @throws Exception
     */
    public function index()
    {
        $typeMissions = (new TypeMission($this->getDB()))->all("" );

        $this->view('admin.typemission.index', compact('typeMissions'));
    }
    public function create()
    {
        $this->view('admin.typemission.form');
    }

    public function createTypeMission()
    {
        $typeMission = new TypeMission($this->getDB());

        $result = $typeMission->create($_POST);

        if ($result) {
            header('Location: /managerKGB/admin/typesmissions');
            exit;
        }
    }

    /**
     * @throws NotFoundException
     */
    public function edit(int $id)
    {
        $typeMission = (new TypeMission($this->getDB()))->findById($id);


        $this->view('admin.typemission.form', compact(
            'typeMission'));
    }

    public function update(int $id)
    {
        $typeMission = new TypeMission($this->getDB());

        $result = $typeMission->update($id, $_POST);

        if ($result) {
            header('Location: /managerKGB/admin/typesmissions');
            exit;
        }
    }

    public function delete(int $id)
    {
        $typeMission = new TypeMission($this->getDB());
        $result = $typeMission->delete($id);

        if ($result) {
            header('Location: /managerKGB/admin/typesmissions');
            exit;
        }
    }
}