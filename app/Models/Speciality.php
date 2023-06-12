<?php

namespace App\Models;

class Speciality extends Model
{
protected $table = 'specialities';
public $perPage = 12;

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