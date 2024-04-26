<?php

namespace App\models;

class ConnexionPDO {
    private static ?\PDO $pdo = null;

    public static function getPdo(): \PDO
    {
        if (self::$pdo === null) {
            self::$pdo = new \PDO('mysql:host=' . HOST . ';dbname=' . DATABASE . ';charset=utf8;', USER, PASSWORD, [
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
            ]);
        }
        return self::$pdo;
    }
}
