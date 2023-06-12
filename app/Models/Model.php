<?php

namespace App\Models;

use App\Exceptions\NotFoundException;
use App\URL;
use Database\DBConnection;
use Exception;
use PDO;

abstract class Model
{
    protected DBConnection $db;
    protected $table;

    protected $perPage;

//    private $stmt;
    private $stmt;

    public function __construct(DBConnection $db)
    {
        $this->db = $db;
    }

    /**
     * @throws Exception
     */
    public function all(string $order): array
    {
        $sql = "SELECT * FROM $this->table";

        if ($this->stmt === null) {
            // Numéro de la page courante
            $currentPage = $this->getCurrentPage();
            $pages = $this->getPages();
            if ($currentPage > $pages) {
                throw new NotFoundException('Cette page n\'existe pas');
            }
            // Calcul de de l'offset
            $offset = $this->perPage * ($currentPage - 1);

            if ($order) {
                $sql .= " ORDER BY " . $order;
            }
            if ($this->perPage) {
                $sql .= " LIMIT " . $this->perPage . " OFFSET " . $offset;
            }
        }
        return $this->query($sql);
    }

    public function allEdit()
    {
        $sql = "SELECT * FROM $this->table";
        return $this->query($sql);
    }

    /**
     * @throws NotFoundException
     */
    public function findById(int $id): Model
    {
        $sql = "SELECT * FROM $this->table WHERE $this->table.id = ?";
        $result = $this->query($sql, [$id], true);
        if ($result === false) {
            throw new NotFoundException("cette id n'existe pas");
        }
        return $result;
    }

    public function create(array  $data){
        $firstParenthesis = "";
        $secondParenthesis = "";
        $i = 1;

        foreach ($data as $key => $value) {
            $comma = $i === count($data) ? "" : ', '; //ajout virgule tant qu'il y a un champs
            $firstParenthesis .= "$key$comma";
            $secondParenthesis .= ":$key$comma";
            $i++;
        }

        return $this->query("INSERT INTO $this->table ($firstParenthesis) 
    VALUES ($secondParenthesis)", $data);
    }

    public function update(int $id, array $data)
    {
        {
            $sqlRequestPart = "";
            $i = 1;

            foreach ($data as $key => $value) {
                $comma = $i === count($data) ? " " : ", ";
                $sqlRequestPart .= "$key = :$key$comma";
                $i++;
            }

            $data['id'] = $id;

            return $this->query("UPDATE $this->table SET $sqlRequestPart WHERE $this->table.id = :id", $data);
        }
    }

    public function delete(int $id): bool
    {
        return $this->query("DELETE FROM $this->table WHERE $this->table.id = ?", [$id]);
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

    /**
     * @throws Exception
     */
    private function getCurrentPage(): int
    {
        return URL::getPositiveInt('page', 1);
    }

    public function getPages(): int
    {
        $count = (int)$this->db->getPDO()
            ->query("SELECT COUNT($this->table.id) FROM $this->table")
            ->fetch(PDO::FETCH_NUM)[0];
        if ($count === 0) {
            return 1;
        }
        $perPage = $this->perPage;
        return ceil($count / $perPage);
    }

    public function paginateInfo(): string
    {
        $pages = $this->getPages();
        if (!isset($_GET['page'])) {
            $page = 1;
        } else {
            $page = $_GET['page'];
        }
        return <<<HTLM
<div>Affichage de la page $page sur $pages pages</div>
HTLM;
    }

    /**
     * @throws Exception
     */
    public function paginatedPrevious($link): ?string
    {
        $currentPage = $this->getCurrentPage();
        if ($currentPage <= 1) return null;
        if ($currentPage > 2) $link .= "?page=" . ($currentPage - 1);
        return <<<HTML
<a class="page-link" href="$link">&laquo;</a>
HTML;
    }

    /**
     * @throws Exception
     */
    public function paginatedNext(string $link): ?string
    {
        $currentPage = $this->getCurrentPage();
        $pages = $this->getPages();
        if ($currentPage >= $pages) return null;
        $link .= "?page=" . ($currentPage + 1);
        return <<<HTML
<a  class="page-link" href= "$link">&raquo;</a>
HTML;
    }


    /**
     * @throws Exception
     */
    public function paginatedNumber($link)
    {
        $currentPage = $this->getCurrentPage();
        $pages = $this->getPages();

        for ($i = 1; $i <= $pages; $i++) {
            if ($i == $currentPage) {
                echo "<a class='page-link active' href='" . $link . "?page=" . $i . "'>" . $i . "</a>";
            } else {
                echo "<a class='page-link' href='" . $link . "?page=" . $i . "'>" . $i . "</a>";
            }
        }
    }
}