<?php

namespace App;

use App\Exceptions\NotFoundException;

class URL
{
    /**
     * @throws NotFoundException
     */
    public static function getInt(string $name, ?int $default = null): ?int
    {
        if (!isset($_GET[$name])) return $default;
        if($_GET[$name] === '0') return 0;

        // Vérification si le numéro de page est un entier
        if (!filter_var($_GET[$name], FILTER_VALIDATE_INT)) {
            throw new NotFoundException("Le paramètre '$name' dans l'url n'est pas un entier");
        }
        return (int)$_GET[$name];
    }

    /**
     * @throws NotFoundException
     */
    public static function getPositiveInt(string $name, ?int $default = null): ?int
    {
        $param = self::getInt($name, $default); // appelle a la classe courante(self)
        if ($param !== null && $param <= 0){
            throw new NotFoundException("Le paramètre '$name' dans l'url n'est pas un entier positif");
        }
        return $param;
    }
}