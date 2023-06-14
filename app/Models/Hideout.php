<?php

namespace App\Models;

use Exception;

class Hideout extends Model
{
    protected $table = 'hideouts';
    public $perPage = "9";

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

    /**
     * @throws Exception
     */
    public function createNewHideout(
        array  $data,

        ?array $relationCountries = null,
        ?array $relationTypesHideouts = null

    ): bool
    {

        parent::create($data);

        $id = $this->db->getPDO()->lastInsertId();

        foreach ($relationCountries as $countryId) {
            $stmtCountries = $this->db->getPDO()->prepare("INSERT INTO country_hideout (hideout_id, country_id) VALUES (?, ?)");
            $resultInsertCountry = $stmtCountries->execute([$id, $countryId]);
            if (!$resultInsertCountry)
                throw new Exception('Erreur lors de l\'ajout d\'un enregistrement dans country_hideout');
        }


        foreach ($relationTypesHideouts as $typesHideoutId) {
            $stmtTypesHideouts = $this->db->getPDO()->prepare("INSERT INTO hideout_type (hideout_id, type_id) VALUES (?, ?)");
            $resultInsertTypeshideouts = $stmtTypesHideouts->execute([$id, $typesHideoutId]);
            if (!$resultInsertTypeshideouts)
                throw new Exception('Erreur lors de l\'ajout d\'un enregistrement dans hideout_type');
        }

        return true;
    }

    /**
     * @throws Exception
     */
    public function updateHideout(
        int    $id,
        array  $data,

        ?array $relationCountries = null,
        ?array $relationTypesHideouts = null
    ): bool
    {
        parent::update($id, $data);


        $stmtCountries = $this->db->getPDO()->prepare("DELETE FROM country_hideout WHERE country_hideout.hideout_id = ?");
        $resultCountries = $stmtCountries->execute([$id]);
        if (!$resultCountries)
            throw new Exception('Erreur lors de la suppression des enregistrements de country_hideout');

        foreach ($relationCountries as $countryId) {
            $stmtCountries = $this->db->getPDO()->prepare("INSERT INTO country_hideout (hideout_id, country_id) VALUES (?, ?)");
            $resultInsertCountry = $stmtCountries->execute([$id, $countryId]);
            if (!$resultInsertCountry)
                throw new Exception('Erreur lors de l\'ajout d\'un enregistrement dans country_hideout');
        }


        $stmtTypesHideouts = $this->db->getPDO()->prepare("DELETE FROM hideout_type WHERE hideout_type.hideout_id = ?");
        $resultTypeshideouts = $stmtTypesHideouts->execute([$id]);
        if (!$resultTypeshideouts)
            throw new Exception('Erreur lors de la suppression des enregistrements de hideout_type');

        foreach ($relationTypesHideouts as $typesHideoutId) {
            $stmtTypesHideouts = $this->db->getPDO()->prepare("INSERT INTO hideout_type (hideout_id, type_id) VALUES (?, ?)");
            $resultInsertTypesHideout = $stmtTypesHideouts->execute([$id, $typesHideoutId]);
            if (!$resultInsertTypesHideout)
                throw new Exception('Erreur lors de l\'ajout d\'un enregistrement dans agent_speciality');
        }
        return true;

    }
}