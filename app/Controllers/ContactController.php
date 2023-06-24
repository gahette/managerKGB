<?php

namespace App\Controllers;

use App\Models\Agent;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $this->isAdmin();

        $contact = new Contact($this->getDB());
        $contacts = $contact->all("");

        $this->view('contact.index', compact('contacts'));
    }
}