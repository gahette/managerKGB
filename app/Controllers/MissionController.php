<?php

namespace App\Controllers;

class MissionController extends Controller
{
    public function index()
    {
        $this->view('mission.index');
    }

    public function show(int $id)
    {
        $req = $this->db->getPDO()->query("SELECT * FROM missions");
        $missions = $req->fetchAll();
        foreach ($missions as $mission){
            echo $mission->title;
        }
        $this->view('mission.show', compact('id'));
    }
}