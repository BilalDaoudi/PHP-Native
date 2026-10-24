<?php

class Connexion{
    public static $cnx = null;

    public static function ToConnecte(){
        Connexion::$cnx = new PDO("mysql:host=localhost;dbname=GestionStagiaire_v1","root","");
    }
    public static function DesConnecte(){
        Connexion::$cnx = null;
    }
}


?>