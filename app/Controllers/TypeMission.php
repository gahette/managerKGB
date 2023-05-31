<?php

namespace App\Controllers;

class TypeMission extends \App\Models\Model
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