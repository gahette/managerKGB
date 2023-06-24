<?php

namespace App\Controllers;

use App\Models\Contact;
use Exception;

class ContactController extends Controller
{
    /**
     * @throws Exception
     */
    public function index()
    {
        $this->isAdmin();

        $contact = new Contact($this->getDB());
        $contacts = $contact->all("");

        $this->view('contact.index', compact('contacts'));
    }
}