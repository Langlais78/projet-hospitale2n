<?php 

    function getPdo() :PDO
    {
     $bdd = new PDO('mysql:host=localhost;dbname=hospitale2n;charset=utf8', 'root', '', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC    
    ]);

    return $bdd;
    }