<?php

namespace App\Models;

class TypeMission extends Model
{
protected $table = 'types_missions';

private int $id;
private string $name;

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
}