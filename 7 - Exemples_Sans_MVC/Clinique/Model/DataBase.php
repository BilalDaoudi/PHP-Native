<?php
abstract class Connexion{
    public $servername = "localhost";
    public $dbname;
    public $user = "root";
    public $password = "";
    public $cnx = null;


    abstract function ToConnecte();
    abstract function DeConnecte();


}
?>