<?php

namespace App\Controllers\Admin;

use App\Controllers\Controller;
use App\Exceptions\NotFoundException;
use App\Models\Status;
use Exception;

class AdminStatusController extends Controller
{
    /**
     * @throws Exception
     */
    public function index()
    {
        $status = (new Status($this->getDB()))->all("" );

        $this->view('admin.status.index', compact('status'));
    }
    public function create()
    {
        $this->view('admin.status.form');
    }

    public function createStatus()
    {
        $status = new Status($this->getDB());

        $result = $status->create($_POST);

        if ($result) {
            header('Location: /managerKGB/admin/status');
            exit;
        }
    }

    /**
     * @throws NotFoundException
     */
    public function edit(int $id)
    {
        $status = (new Status($this->getDB()))->findById($id);


        $this->view('admin.status.form', compact(
            'status'));
    }

    public function update(int $id)
    {
        $status = new Status($this->getDB());

        $result = $status->update($id, $_POST);

        if ($result) {
            header('Location: /managerKGB/admin/status');
            exit;
        }
    }

    public function delete(int $id)
    {
        $status = new Status($this->getDB());
        $result = $status->delete($id);

        if ($result) {
            header('Location: /managerKGB/admin/status');
            exit;
        }
    }
}