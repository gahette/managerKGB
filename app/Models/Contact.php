<?php

namespace App\Models;

use DateTime;
use Exception;

class Contact extends Model
{
    protected $table = 'contacts';
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
        return (new DateTime($this->date_of_birth))->format('Y/m/d');
    }

    /**
     * @throws Exception
     */
    public function getDateOfBirthF(): string
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
                  INNER JOIN contact_country `cc` on c.id = `cc`.country_id
                    WHERE `cc`.contact_id = ?", [$this->id]);
    }

    public function getMissions()
    {
        return $this->query("
                    SELECT m.* FROM missions m 
                  INNER JOIN contact_mission `cm` on m.id = `cm`.mission_id
                    WHERE `cm`.contact_id = ?", [$this->id]);
    }

    public function getCountriesMissions()
    {
        return $this->query("
                    SELECT c.* FROM countries c
                INNER JOIN country_mission cm on c.id = cm.country_id
                INNER JOIN contact_mission m on cm.mission_id = m.mission_id
                    WHERE contact_id = ?", [$this->id]);
    }

    /**
     * @throws Exception
     */
    public function createNewContact(
        array  $data,
        ?array $relationCountries = null
    ): bool
    {

        parent::create($data);

        $id = $this->db->getPDO()->lastInsertId();

        foreach ($relationCountries as $countryId) {
            $stmtCountries = $this->db->getPDO()->prepare("INSERT INTO contact_country (contact_id, country_id) VALUES (?, ?)");
            $resultInsertCountry = $stmtCountries->execute([$id, $countryId]);
            if (!$resultInsertCountry)
                throw new Exception('Erreur lors de l\'ajout d\'un enregistrement dans contact_country');
        }
        return true;
    }

    /**
     * @throws Exception
     */
    public function updateContact(
        int    $id,
        array  $data,

        ?array $relationCountries = null

    ): bool
    {
        parent::update($id, $data);


        $stmtCountries = $this->db->getPDO()->prepare("DELETE FROM contact_country WHERE contact_country.contact_id = ?");
        $resultCountries = $stmtCountries->execute([$id]);
        if (!$resultCountries)
            throw new Exception('Erreur lors de la suppression des enregistrements de contact_country');

        foreach ($relationCountries as $countryId) {
            $stmtCountries = $this->db->getPDO()->prepare("INSERT INTO contact_country (contact_id, country_id) VALUES (?, ?)");
            $resultInsertCountry = $stmtCountries->execute([$id, $countryId]);
            if (!$resultInsertCountry)
                throw new Exception('Erreur lors de l\'ajout d\'un enregistrement dans contact_country');
        }

        return true;

    }
}