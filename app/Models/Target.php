<?php

namespace App\Models;

use DateTime;
use Exception;

class Target extends Model
{
    protected $table = 'targets';
    public $perPage = "9";
    private int $id;
    private string $lastname;

    private string $firstname;
    private string $date_of_birth;
    private string $name_code;

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
    public function getLastname(): string
    {
        return $this->lastname;
    }

    /**
     * @return string
     */
    public function getFirstname(): string
    {
        return $this->firstname;
    }

    /**
     * @return string
     * @throws Exception
     */
    public function getDateOfBirth(): string
    {
        return (new DateTime($this->date_of_birth))->format('d/m/Y');
    }

    /**
     * @return string
     */
    public function getNameCode(): string
    {
        return $this->name_code;
    }

    public function getCountries()
    {
        return $this->query("
                    SELECT c.* FROM countries c
                  INNER JOIN country_target ct on c.id = ct.country_id
                    WHERE target_id = ?", [$this->id]);
    }

    public function getMissions()
    {
        return $this->query("
                    SELECT m.* FROM missions m 
                  INNER JOIN mission_target mt on m.id = mt.mission_id
                    WHERE `mt`.target_id = ?", [$this->id]);
    }

    public function getCountriesMissions()
    {
        return $this->query("
                    SELECT c.* FROM countries c
                INNER JOIN country_mission cm on c.id = cm.country_id
                INNER JOIN mission_target m on cm.mission_id = m.mission_id
                    WHERE target_id = ?", [$this->id]);
    }
}