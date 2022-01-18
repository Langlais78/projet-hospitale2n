<?php 

class Database{
    
    private static $requete = null;

    public static function getPdo() :PDO
    {
        if(self::$requete === null){
            self::$requete = new PDO('mysql:host=localhost;dbname=hospitale2n;charset=utf8', 'root', '', [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC    
            ]);
        }

        return self::$requete;
    }
}