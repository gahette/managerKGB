<?php

namespace App\Models;

use Database\DBConnection;

abstract class Model
{
    protected DBConnection $db;
    protected $table;

    public function __construct(DBConnection $db)
    {
        $this->db = $db;
    }

    public function all(): array
    {
        $stmt = $this->db->getPDO()->query("SELECT * FROM $this->table ORDER BY $this->table.created_at DESC");
        return $stmt->fetchAll();
    }

    public function findById(int $id): \stdClass
    {
      $stmt = $this->db->getPDO()->prepare("SELECT * FROM $this->table WHERE $this->table.id = ?");
      $stmt->execute([$id]);
      return $stmt->fetch();
    }
}