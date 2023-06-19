<?php

namespace App\Controllers;

use App\Exceptions\NotFoundException;
use App\Models\Agent;
use App\Models\Contact;
use App\Models\Country;
use App\Models\Hideout;
use App\Models\Mission;
use App\Models\Target;
use Exception;

class MissionController extends Controller
{
    /**
     * @throws Exception
     */
    public function index()
    {
        $this->isAdmin();

        $mission = new Mission($this->getDB());
        $missions = $mission->all("created_at" . " DESC");

        $this->view('mission.index', compact('missions'));
    }

    /**
     * @throws NotFoundException
     */
    public function show(int $id)
    {
        $this->isAdmin();

        $mission = new Mission($this->getDB());
        $mission = $mission->findByID($id);

        $this->view('mission.show', compact('mission'));
    }

    /**
     * @throws NotFoundException
     */
    public function country(int $id)
    {
        $this->isAdmin();

        $country = (new Country($this->getDB()))->findById($id);
        $this->view('mission.country', compact('country'));
    }

    /**
     * @throws NotFoundException
     */
    public function agent(int $id)
    {
        $this->isAdmin();

        $agent = (new Agent($this->getDB()))->findById($id);
        $this->view('mission.agent', compact('agent'));
    }

    /**
     * @throws NotFoundException
     */
    public function contact(int $id)
    {
        $this->isAdmin();

        $contact = (new Contact($this->getDB()))->findById($id);
        $this->view('mission.contact', compact('contact'));
    }

    /**
     * @throws NotFoundException
     */
    public function target(int $id)
    {
        $this->isAdmin();

        $target = (new Target($this->getDB()))->findById($id);
        $this->view('mission.target', compact('target'));
    }

    /**
     * @throws NotFoundException
     */
    public function hideout(int $id)
    {
        $hideout = (new Hideout($this->getDB()))->findById($id);
        $this->view('mission.hideout', compact('hideout'));
    }

}