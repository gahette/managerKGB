<?php

namespace App\Models;

use Database\DBConnection;
use PDO;

abstract class Model
{
    protected DBConnection $db;
    protected $table;

    public function __construct(DBConnection $db)
    {
        $this->db = $db;
    }

    public function all(string $order): array
    {
        $sql = "SELECT * FROM $this->table";

        if ($order) {
            $sql .= " ORDER BY " . $order;
        }
        return $this->query($sql);
    }

    public function findById(int $id): Model
    {
        $sql = "SELECT * FROM $this->table WHERE $this->table.id = ?";
        return $this->query($sql, [$id], true);
    }

    public function query(string $sql, array $param = null, bool $single = null)
    {
        $method = is_null($param) ? 'query' : 'prepare';

        if (strpos($sql, 'DELETE') === 0
            || strpos($sql, 'UPDATE') === 0
            || strpos($sql, 'INSERT') === 0) {

            $stmt = $this->db->getPDO()->$method($sql);
            $stmt->setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this->db]);
            return $stmt->execute($param);
        }

        $fetch = is_null($single) ? 'fetchAll' : 'fetch';

        $stmt = $this->db->getPDO()->$method($sql);
        $stmt->setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this->db]);


        if ($method !== 'query') {
            $stmt->execute($param);
        }
        return $stmt->$fetch();
    }
}