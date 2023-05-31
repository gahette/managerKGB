<?php

namespace App\Models;

class Hideout extends Model
{
    protected $table = 'hideouts';

    private int $id;

    private string $code;
    private string $address;

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
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    public function getMissions()
    {
        return $this->query("
                    SELECT m.* FROM missions m 
                    INNER JOIN hideout_mission hm on m.id = hm.mission_id
                    WHERE hm.hideout_id = ?", [$this->id]
        );
    }

    public function getCountries()
    {
        return $this->query("
                    SELECT c.* FROM countries c
                    INNER JOIN country_hideout `ch` on c.id = `ch`.country_id
                    WHERE `ch`.hideout_id = ?", [$this->id]);
    }

    public function getTypes()
    {
        return $this->query("
                    SELECT t.* FROM types_hideouts t 
                    INNER JOIN hideout_type ht on t.id = ht.type_id
                    WHERE ht.hideout_id = ?", [$this->id]);
    }
}