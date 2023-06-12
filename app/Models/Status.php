<?php

namespace App\Models;

class Status extends Model
{
    protected $table = 'status';
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