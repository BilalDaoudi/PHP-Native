<?php

abstract class Connexion{
    public static $cnx = null;

    public static function Toconnecte(){
        self::$cnx = new PDO("mysql:host=localhost;dbname=gestionproduit_v2","root","");
    }
    public static function Desconnecte(){
        self::$cnx = null;
    }
}




?>