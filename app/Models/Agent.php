<?php

namespace App\Models;

use DateTime;
use Exception;

class Agent extends Model
{
    protected $table = "agents";
    public $perPage = "9";

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

    public function getCountries()
    {
        return $this->query("
                    SELECT c.* FROM countries c 
                    INNER JOIN agent_country ac on c.id = ac.`country_id` 
                    WHERE ac.agent_id = ?", [$this->id]);
    }

    public function getSpecialities()
    {
        return $this->query("
                    SELECT sp.* FROM specialities sp
                    INNER JOIN agent_speciality asp on sp.id = asp.`speciality_id` 
                    WHERE asp.agent_id = ?", [$this->id]);
    }

    /**
     * @throws Exception
     */
    public function createNewAgent(
        array  $data,

        ?array $relationCountries = null,
        ?array $relationSpecialities = null

    ): bool
    {

        parent::create($data);

        $id = $this->db->getPDO()->lastInsertId();

        foreach ($relationCountries as $countryId) {
            $stmtCountries = $this->db->getPDO()->prepare("INSERT INTO agent_country (agent_id, country_id) VALUES (?, ?)");
            $resultInsertCountry = $stmtCountries->execute([$id, $countryId]);
            if (!$resultInsertCountry)
                throw new Exception('Erreur lors de l\'ajout d\'un enregistrement dans agent_country');
        }


            foreach ($relationSpecialities as $specialityId) {
                $stmtSpecialities = $this->db->getPDO()->prepare("INSERT INTO agent_speciality (agent_id, speciality_id) VALUES (?, ?)");
                $resultInsertSpeciality = $stmtSpecialities->execute([$id, $specialityId]);
                if (!$resultInsertSpeciality)
                    throw new Exception('Erreur lors de l\'ajout d\'un enregistrement dans agent_speciality');
            }

        return true;
    }

    /**
     * @throws Exception
     */
    public function updateAgent(
        int    $id,
        array  $data,

        ?array $relationCountries = null,
        ?array $relationSpecialities = null
    ): bool
    {
        parent::update($id, $data);


        $stmtCountries = $this->db->getPDO()->prepare("DELETE FROM agent_country WHERE agent_country.agent_id = ?");
        $resultCountries = $stmtCountries->execute([$id]);
        if (!$resultCountries)
            throw new Exception('Erreur lors de la suppression des enregistrements de agent_country');

        foreach ($relationCountries as $countryId) {
            $stmtCountries = $this->db->getPDO()->prepare("INSERT INTO agent_country (agent_id, country_id) VALUES (?, ?)");
            $resultInsertCountry = $stmtCountries->execute([$id, $countryId]);
            if (!$resultInsertCountry)
                throw new Exception('Erreur lors de l\'ajout d\'un enregistrement dans agent_country');
        }


        $stmtSpecialities = $this->db->getPDO()->prepare("DELETE FROM agent_speciality WHERE agent_speciality.agent_id = ?");
        $resultSpecialities = $stmtSpecialities->execute([$id]);
        if (!$resultSpecialities)
            throw new Exception('Erreur lors de la suppression des enregistrements de agent_speciality');

        foreach ($relationSpecialities as $specialityId) {
            $stmtSpecialities = $this->db->getPDO()->prepare("INSERT INTO agent_speciality (agent_id, speciality_id) VALUES (?, ?)");
            $resultInsertSpeciality = $stmtSpecialities->execute([$id, $specialityId]);
            if (!$resultInsertSpeciality)
                throw new Exception('Erreur lors de l\'ajout d\'un enregistrement dans agent_speciality');
        }
        return true;

    }
}