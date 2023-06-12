<?php

namespace App\Models;

use DateTime;
use Exception;

class Mission extends Model
{
    protected $table = 'missions';

    public $perPage = 4;

    private int $id;
    private string $title;
    private string $content;
    private string $name_code;
    private string $created_at;
    private string $closed_at;

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
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @return string
     */
    public function getNameCode(): string
    {
        return $this->name_code;
    }

    /**
     * @return string
     * @throws Exception
     */
    public function getCreatedAt(): string
    {
        return (new DateTime($this->created_at))->format('d/m/Y à H:i');
    }

    /**
     * @return string
     * @throws Exception
     */
    public function getClosedAt(): string
    {
        return (new DateTime($this->closed_at))->format('d/m/Y à H:i');
    }

    public function getExcerpt(): string
    {
        return substr($this->content, 0, 200) . '...';
    }

    public function getExcerpt2(): string
    {
        return substr($this->content, 0, 40) . '...';
    }

    public function getCountries()
    {
        return $this->query("
                    SELECT c.*, c.id FROM countries c 
                    INNER JOIN country_mission cm on c.id = cm.`country_id` 
                    WHERE cm.mission_id = ?", [$this->id]);
    }

    public function getAgents()
    {
        return $this->query("
        SELECT a.* FROM agents a 
        INNER JOIN agent_mission am on a.id = am.agent_id
        WHERE am.mission_id = ?", [$this->id]);
    }

    public function getStatus()
    {
        return $this->query("
        SELECT s.* FROM status s 
        INNER JOIN mission_status ms on s.id = ms.status_id
        WHERE ms.mission_id = ?", [$this->id]);
    }

    public function getSpecialities()
    {
        return $this->query("
        SELECT s.* FROM specialities s 
        INNER JOIN mission_speciality ms on s.id = ms.speciality_id
        WHERE ms.mission_id = ?", [$this->id]);
    }

    public function getContacts()
    {
        return $this->query("
        SELECT c.* FROM contacts c 
        INNER JOIN contact_mission cm on c.id = cm.contact_id
        WHERE cm.mission_id = ?", [$this->id]);
    }

    public function getTargets()
    {
        return $this->query("
        SELECT t.* FROM targets t 
        INNER JOIN mission_target mt on t.id = mt.target_id
        WHERE mt.mission_id = ?", [$this->id]);
    }

    public function getHideouts()
    {
        return $this->query("
        SELECT h.* FROM hideouts h 
        INNER JOIN hideout_mission hm on h.id = hm.hideout_id
        WHERE hm.mission_id = ?", [$this->id]);
    }

    public function getTypesMissions()
    {
        return $this->query("
        SELECT t.* FROM types_missions t
        INNER JOIN mission_type mt on t.id = mt.type_id
        WHERE mt.mission_id = ?", [$this->id]);
    }

    /**
     * @throws Exception
     */
    public function create(
        array  $data,
        ?array $relationStatus = null,
        ?array $relationCountries = null,
        ?array $relationSpecialities = null,
        ?array $relationTypesMissions = null,
        ?array $relationAgents = null,
        ?array $relationTargets = null,
        ?array $relationContacts = null,
        ?array $relationHideouts = null
    ): bool
    {

        parent::create($data);

        $id = $this->db->getPDO()->lastInsertId();

        foreach ($relationStatus as $statusId) {
            $stmtStatus = $this->db->getPDO()->prepare("INSERT INTO mission_status(mission_id, status_id) VALUES (?, ?)");
            $resultInsertStatus = $stmtStatus->execute([$id, $statusId]);
            if (!$resultInsertStatus)
                throw new Exception('Erreur lors de l\'ajout d\'un enregistrement dans mission_status');
        }
        foreach ($relationCountries as $countryId) {
            $stmtCountries = $this->db->getPDO()->prepare("INSERT INTO country_mission (mission_id, country_id) VALUES (?, ?)");
            $resultInsertCountry = $stmtCountries->execute([$id, $countryId]);
            if (!$resultInsertCountry)
                throw new Exception('Erreur lors de l\'ajout d\'un enregistrement dans country_mission');
        }
        foreach ($relationTypesMissions as $typesMissionId) {
            $stmtTypesMissions = $this->db->getPDO()->prepare("INSERT INTO mission_type (mission_id, type_id) VALUES (?, ?)");
            $resultInsertTypesMission = $stmtTypesMissions->execute([$id, $typesMissionId]);
            if (!$resultInsertTypesMission)
                throw new Exception('Erreur lors de l\'ajout d\'un enregistrement dans mission_types_mission');
        }
        foreach ($relationSpecialities as $specialityId) {
            $stmtSpecialities = $this->db->getPDO()->prepare("INSERT INTO mission_speciality (mission_id, speciality_id) VALUES (?, ?)");
            $resultInsertSpeciality = $stmtSpecialities->execute([$id, $specialityId]);
            if (!$resultInsertSpeciality)
                throw new Exception('Erreur lors de l\'ajout d\'un enregistrement dans mission_speciality');
        }
        foreach ($relationAgents as $agentId) {
            $stmtAgents = $this->db->getPDO()->prepare("INSERT INTO agent_mission (mission_id, agent_id) VALUES (?, ?)");
            $resultInsertAgent = $stmtAgents->execute([$id, $agentId]);
            if (!$resultInsertAgent)
                throw new Exception('Erreur lors de l\'ajout d\'un enregistrement dans agent_mission');
        }
        foreach ($relationTargets as $targetId) {
            $stmtTargets = $this->db->getPDO()->prepare("INSERT INTO mission_target (mission_id, target_id) VALUES (?, ?)");
            $resultInsertTarget = $stmtTargets->execute([$id, $targetId]);
            if (!$resultInsertTarget)
                throw new Exception('Erreur lors de l\'ajout d\'un enregistrement dans mission_target');
        }
        foreach ($relationContacts as $contactId) {
            $stmtContacts = $this->db->getPDO()->prepare("INSERT INTO contact_mission (mission_id, contact_id) VALUES (?, ?)");
            $resultInsertContacts = $stmtContacts->execute([$id, $contactId]);
            if (!$resultInsertContacts)
                throw new Exception('Erreur lors de l\'ajout d\'un enregistrement dans contact_mission');
        }
        foreach ($relationHideouts as $hideoutId) {
            $stmtHideouts = $this->db->getPDO()->prepare("INSERT INTO hideout_mission (mission_id, hideout_id) VALUES (?, ?)");
            $resultInsertHideouts = $stmtHideouts->execute([$id, $hideoutId]);
            if (!$resultInsertHideouts)
                throw new Exception('Erreur lors de l\'ajout d\'un enregistrement dans hideout_mission');
        }
        return true;
    }

    /**
     * @throws Exception
     */
    public function update(
        int $id,
        array $data,
        ?array $relationStatus = null,
        ?array $relationCountries = null,
        ?array $relationTypesMissions = null,
        ?array $relationSpecialities = null,
        ?array $relationAgents = null,
        ?array $relationTargets = null,
        ?array $relationContacts = null,
        ?array $relationHideouts = null
    ): bool
    {
        parent::update($id, $data);

        $stmtStatus = $this->db->getPDO()->prepare("DELETE FROM mission_status WHERE mission_status.mission_id = ?");
        $resultStatus = $stmtStatus->execute([$id]);
        if (!$resultStatus)
            throw new Exception('Erreur lors de la suppression des enregistrements de mission_status');

        foreach ($relationStatus as $statusId) {
            $stmtStatus = $this->db->getPDO()->prepare("INSERT INTO mission_status(mission_id, status_id) VALUES (?, ?)");
            $resultInsertStatus = $stmtStatus->execute([$id, $statusId]);
            if (!$resultInsertStatus)
                throw new Exception('Erreur lors de l\'ajout d\'un enregistrement dans mission_status');
        }

        $stmtCountries = $this->db->getPDO()->prepare("DELETE FROM country_mission WHERE country_mission.mission_id = ?");
        $resultCountries = $stmtCountries->execute([$id]);
        if (!$resultCountries)
            throw new Exception('Erreur lors de la suppression des enregistrements de country_mission');

        foreach ($relationCountries as $countryId) {
            $stmtCountries = $this->db->getPDO()->prepare("INSERT INTO country_mission (mission_id, country_id) VALUES (?, ?)");
            $resultInsertCountry = $stmtCountries->execute([$id, $countryId]);
            if (!$resultInsertCountry)
                throw new Exception('Erreur lors de l\'ajout d\'un enregistrement dans country_mission');
        }

        $stmtTypesMissions = $this->db->getPDO()->prepare("DELETE FROM mission_type WHERE mission_type.mission_id = ?");
        $resultTypesMissions = $stmtTypesMissions->execute([$id]);
        if (!$resultTypesMissions)
            throw new Exception('Erreur lors de la suppression des enregistrements de mission_types_mission');

        foreach ($relationTypesMissions as $typesMissionId) {
            $stmtTypesMissions = $this->db->getPDO()->prepare("INSERT INTO mission_type (mission_id, type_id) VALUES (?, ?)");
            $resultInsertTypesMission = $stmtTypesMissions->execute([$id, $typesMissionId]);
            if (!$resultInsertTypesMission)
                throw new Exception('Erreur lors de l\'ajout d\'un enregistrement dans mission_types_mission');
        }

        $stmtSpecialities = $this->db->getPDO()->prepare("DELETE FROM mission_speciality WHERE mission_speciality.mission_id = ?");
        $resultSpecialities = $stmtSpecialities->execute([$id]);
        if (!$resultSpecialities)
            throw new Exception('Erreur lors de la suppression des enregistrements de mission_speciality');

        foreach ($relationSpecialities as $specialityId) {
            $stmtSpecialities = $this->db->getPDO()->prepare("INSERT INTO mission_speciality (mission_id, speciality_id) VALUES (?, ?)");
            $resultInsertSpeciality = $stmtSpecialities->execute([$id, $specialityId]);
            if (!$resultInsertSpeciality)
                throw new Exception('Erreur lors de l\'ajout d\'un enregistrement dans mission_speciality');
        }

        $stmtAgents = $this->db->getPDO()->prepare("DELETE FROM agent_mission WHERE agent_mission.mission_id = ?");
        $resultAgents = $stmtAgents->execute([$id]);
        if (!$resultAgents)
            throw new Exception('Erreur lors de la suppression des enregistrements de agent_mission');

        foreach ($relationAgents as $agentId) {
            $stmtAgents = $this->db->getPDO()->prepare("INSERT INTO agent_mission (mission_id, agent_id) VALUES (?, ?)");
            $resultInsertAgent = $stmtAgents->execute([$id, $agentId]);
            if (!$resultInsertAgent)
                throw new Exception('Erreur lors de l\'ajout d\'un enregistrement dans agent_mission');
        }

        $stmtTargets = $this->db->getPDO()->prepare("DELETE FROM mission_target WHERE mission_target.mission_id = ?");
        $resultTargets = $stmtTargets->execute([$id]);
        if (!$resultTargets)
            throw new Exception('Erreur lors de la suppression des enregistrements de mission_target');

        foreach ($relationTargets as $targetId) {
            $stmtTargets = $this->db->getPDO()->prepare("INSERT INTO mission_target (mission_id, target_id) VALUES (?, ?)");
            $resultInsertTarget = $stmtTargets->execute([$id, $targetId]);
            if (!$resultInsertTarget)
                throw new Exception('Erreur lors de l\'ajout d\'un enregistrement dans mission_target');
        }

        $stmtContacts = $this->db->getPDO()->prepare("DELETE FROM contact_mission WHERE contact_mission.mission_id = ?");
        $resultContacts = $stmtContacts->execute([$id]);
        if (!$resultContacts)
            throw new Exception('Erreur lors de la suppression des enregistrements de contact_mission');

        foreach ($relationContacts as $contactId) {
            $stmtContacts = $this->db->getPDO()->prepare("INSERT INTO contact_mission (mission_id, contact_id) VALUES (?, ?)");
            $resultInsertContacts = $stmtContacts->execute([$id, $contactId]);
            if (!$resultInsertContacts)
                throw new Exception('Erreur lors de l\'ajout d\'un enregistrement dans contact_mission');
        }

        $stmtHideouts = $this->db->getPDO()->prepare("DELETE FROM hideout_mission WHERE hideout_mission.mission_id = ?");
        $resultHideouts = $stmtHideouts->execute([$id]);
        if (!$resultHideouts)
            throw new Exception('Erreur lors de la suppression des enregistrements de hideout_mission');

        foreach ($relationHideouts as $hideoutId) {
            $stmtHideouts = $this->db->getPDO()->prepare("INSERT INTO hideout_mission (mission_id, hideout_id) VALUES (?, ?)");
            $resultInsertHideouts = $stmtHideouts->execute([$id, $hideoutId]);
            if (!$resultInsertHideouts)
                throw new Exception('Erreur lors de l\'ajout d\'un enregistrement dans hideout_mission');
        }
        return true;

    }
}