<?php

namespace App\Models;

class Status extends Model
{
    protected $table = 'status';

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