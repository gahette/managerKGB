<?php

namespace App\Models;


use DateTime;
use Exception;

class User extends Model
{
    protected $table = 'users';

//    public $perPage = 24;

    private int $id;

    private string $username;
    private string $lastname;
    private string $firstname;
    private string $email;
    private string $password;
    private string $created_at;
    private int $admin;

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
    public function getUsername(): string
    {
        return $this->username;
    }

        /**
     * @return string
     */
    public function getLastname(): string
    {
        return $this->lastname;
    }

    /**
     * @return string
     */
    public function getFirstname(): string
    {
        return $this->firstname;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return string
     * @throws Exception
     */
    public function getCreatedAt(): string
    {
        return (new DateTime($this->created_at))->format('d/m/Y à H:i');
    }

    /**
     * @return int
     */
    public function getAdmin(): int
    {
        return $this->admin;
    }

    public function getByUsername(string $username): User
    {
        return $this->query("SELECT * FROM $this->table WHERE $this->table.username = ?", [$username], true);
    }
}