<?php 
class Connexion{
    public static $cnx = null ;
    public static function Connecte(){
        self::$cnx = new PDO("mysql:host=localhost;dbname=GestionProjets","root","");
    }
    public static function Deconnecte(){
        self::$cnx = null;
    }
}



?>