<?php


class ConnexionDB{

    public static $Server = "localhost";
    public static $DBname = "E_Commerce";
    public static $User = "root";
    public static $Password = "";
    public static $cnx = null;
    
    public static function Toconnecte()
    {
        $ser = ConnexionDB::$Server;
        $db = ConnexionDB::$DBname;
        $user = ConnexionDB::$User;
        $pass = ConnexionDB::$Password;

        ConnexionDB::$cnx = new PDO("mysql:host=$ser;dbname=$db",$user,$pass);
    }
    public static function Desconnecte()
    {
        ConnexionDB::$cnx = null;
    }

}

?>