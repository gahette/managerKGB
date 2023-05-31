<?php

namespace App\Models;

class Speciality extends Model
{
protected $table = 'specialities';

private int $id;

private string $name;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}