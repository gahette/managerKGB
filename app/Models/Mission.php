<?php

namespace App\Models;

use DateTime;
use Exception;

class Mission extends Model
{
    protected $table = 'missions';

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

    public function getCountries()
    {
        return $this->query("
                    SELECT c.name, c.id FROM countries c 
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
}