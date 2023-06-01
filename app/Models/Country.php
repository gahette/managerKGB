<?php

namespace App\Models;

class Country extends Model
{
    public $table = "countries";
    public $perPage = 12;
    private int $id;
    private string $name;
    private string $nationalities;
    private string $iso3166;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getNationalities(): string
    {
        return $this->nationalities;
    }

    /**
     * @return string
     */
    public function getIso3166(): string
    {
        return $this->iso3166;
    }

    public function getMissions()
    {
        return $this->query("
                SELECT m.* FROM missions m 
                INNER JOIN country_mission cm on m.id = cm.mission_id
                WHERE cm.country_id = ?
        ", [$this->id]
        );
    }

    public function getAgents()
    {
        return $this->query("
                SELECT a.* FROM agents a 
                INNER JOIN agent_country ac on a.id = ac.agent_id
                WHERE ac.country_id = ?
        ", [$this->id]
        );
    }
    public function getContacts()
    {
        return $this->query("
                SELECT c.* FROM contacts c 
                INNER JOIN contact_country cc on c.id = cc.contact_id
                WHERE cc.country_id = ?
        ", [$this->id]
        );
    }
    public function getTargets()
    {
        return $this->query("
                SELECT t.* FROM targets t 
                INNER JOIN country_target ct on t.id = ct.target_id
                WHERE ct.country_id = ?
        ", [$this->id]
        );
    }
    public function getHideouts()
    {
        return $this->query("
                SELECT h.* FROM hideouts h
                INNER JOIN country_hideout ch on h.id = ch.hideout_id
                WHERE ch.country_id = ?
        ", [$this->id]
        );
    }

    public function getAgentsMissions()
    {
        return $this->query("
                    SELECT a.* FROM agents a
                INNER JOIN agent_mission am on a.id = am.agent_id
                INNER JOIN country_mission m on am.mission_id = m.mission_id
                    WHERE country_id = ?", [$this->id]);
    }
    public function getContactsMissions()
    {
        return $this->query("
                    SELECT c.* FROM contacts c
                INNER JOIN contact_mission cm on c.id = cm.contact_id
                INNER JOIN country_mission m on cm.mission_id = m.mission_id
                    WHERE country_id = ?", [$this->id]);
    }
    public function getTargetsMissions()
    {
        return $this->query("
                    SELECT t.* FROM targets t
                INNER JOIN mission_target mt on t.id = mt.target_id
                INNER JOIN country_mission m on mt.mission_id = m.mission_id
                    WHERE country_id = ?", [$this->id]);
    }

}