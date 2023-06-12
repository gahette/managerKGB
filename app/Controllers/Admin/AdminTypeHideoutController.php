<?php

namespace App\Controllers\Admin;

use App\Controllers\Controller;
use App\Models\TypeHideout;
use Exception;

class AdminTypeHideoutController extends Controller
{
    /**
     * @throws Exception
     */
    public function index()
    {
        $typeHideouts = (new TypeHideout($this->getDB()))->all("" );

        $this->view('admin.typehideout.index', compact('typeHideouts'));
    }
    public function create()
    {
        $this->view('admin.typehideout.form');
    }

    public function createTypeHideout()
    {
        $typeHideout = new TypeHideout($this->getDB());

        $result = $typeHideout->create($_POST);

        if ($result) {
            header('Location: /managerKGB/admin/typeshideouts');
            exit;
        }
    }
    public function edit(int $id)
    {
        $typeHideout = (new TypeHideout($this->getDB()))->findById($id);


        $this->view('admin.typehideout.form', compact(
            'typeHideout'));
    }

    public function update(int $id)
    {
        $typeHideout = new TypeHideout($this->getDB());

        $result = $typeHideout->update($id, $_POST);

        if ($result) {
            header('Location: /managerKGB/admin/typeshideouts');
            exit;
        }
    }

    public function delete(int $id)
    {
        $typeHideout = new TypeHideout($this->getDB());
        $result = $typeHideout->delete($id);

        if ($result) {
            header('Location: /managerKGB/admin/typeshideouts');
            exit;
        }
    }
}