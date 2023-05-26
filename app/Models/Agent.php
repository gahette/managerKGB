<?php

namespace App\Models;

use DateTime;
use Exception;

class Agent extends Model
{
    public $table = "agents";

    private int $id;
    private string $lastname;
    private string $firstname;
    private string $date_of_birth;
    private string $id_code;

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
    public function getIdCode(): string
    {
        return $this->id_code;
    }
    public function getMissions()
    {
        return $this->query("
                    SELECT m.* FROM missions m 
                  INNER JOIN agent_mission `am` on m.id = `am`.mission_id
                    WHERE `am`.agent_id = ?", [$this->id]);
    }

}