<?php

namespace App\Models;

class TypeHideout extends Model
{
protected $table = 'types_hideouts';

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