<?php
class ConnexionDB{
    public $cnx;
    public $Database;
    public $Server;
    public $User;
    public $Password;
    public $Table;

    function __construct($db,$server,$user,$pass){
        $this->Database = $db;
        $this->Server = $server;
        $this->User = $user;
        $this->Password = $pass;
    }

    public function ToConnecte(){
        $Server_Data = "mysql:host=".$this->Server.";dbname=".$this->Database;
        $this->cnx = new PDO($Server_Data,$this->User,$this->Password);
    }
    public function DeConnecte(){
        $this->cnx = null;
    }

    public function GetAll(){
        $req = "select * from ".$this->Table;
        $this->ToConnecte();
        $All_Table = $this->cnx->query($req)->fetchAll();
        $this->DeConnecte();
        return $All_Table;
    }

    

}

?>