<?php

namespace App\Controllers\Admin;

use App\Controllers\Controller;
use App\Exceptions\NotFoundException;
use App\Models\Contact;
use App\Models\Country;
use Exception;

class AdminContactController extends Controller
{
    /**
     * @throws Exception
     */
    public function index()
    {
        $contacts = (new Contact($this->getDB()))->all("");

        $this->view('admin.contact.index', compact('contacts'));
    }

    public function create()
    {
        $countries = (new Country($this->getDB()))->allEdit();

        $this->view('admin.contact.form', compact(
            'countries'
        ));
    }

    /**
     * @throws Exception
     */
    public function createContact()
    {
        $contact = new Contact($this->getDB());
        $countries = array_pop($_POST);

//dd($specialities, $countries);
        $result = $contact->createNewContact($_POST, $countries);

        if ($result) {
            header('Location: /managerKGB/admin/contacts');
            exit;
        }
    }

    /**
     * @throws NotFoundException
     */
    public function edit(int $id)
    {
        $contact = (new Contact($this->getDB()))->findById($id);

        $countries = (new Country($this->getDB()))->allEdit();

        $this->view('admin.contact.form', compact(
            'contact',
            'countries'
        ));
    }

    /**
     * @throws Exception
     */
    public function update(int $id)
    {
        $contact = new Contact($this->getDB());

        $countries = array_pop($_POST);

//dd($countries, $specialities);
        $result = $contact->updateContact($id, $_POST, $countries);

        if ($result) {
            header('Location: /managerKGB/admin/contacts');
            exit;
        }
    }

    public function delete(int $id)
    {
        $contact = new Contact($this->getDB());
        $result = $contact->delete($id);

        if ($result) {
            header('Location: /managerKGB/admin/contacts');
            exit;
        }
    }
}