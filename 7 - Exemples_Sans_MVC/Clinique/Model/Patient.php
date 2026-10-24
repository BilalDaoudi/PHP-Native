<?php
require "DataBase.php";
class Patient extends Connexion
{
    public $NumPatient;
    public $Nom;
    public $Prenom;
    public $DateNaissance;
    public $Tel;
    public $LoginPatient;
    public $Password;

    function __construct($db)
    {
        $this->dbname = $db;
    }

    public function ToConnecte()
    {
        $server_db = "mysql:host=" . $this->servername . ";dbname=" . $this->dbname;
        $this->cnx = new PDO($server_db, $this->user, $this->password);
    }
    public function DeConnecte()
    {
        $this->cnx = null;
    }


    public function GetAll()
    {
        $req = "select * from Patient";
        $rows = $this->cnx->query($req)->fetchAll();
        return $rows;
    }

    public function ConnectPatient($email,$pass)
    {
        $row = $this->cnx->query("select * from Patient where loginPatient = '$email' and pass = '$pass'")->fetch();
        if ($row)
            return $row;
        else
            return null;
    }
    public function FindPatient($num)
    {
        $n = (int)($num);
        $req = "select * from Patient where NumPatient = $num";
        $row = $this->cnx->query($req)->fetch();
        if ($row)
            return $row;
        else
            return null;
    }

    public function AddPatient()
    {
        $num = (int)($this->NumMedecin);
        $r = $this->FindPatient($num);
        if ($r == null) {
            $req = "insert into Patient values ($num,'{$this->Nom}','{$this->Prenom}','{$this->DateNaissance}'
                    ,'{$this->Tel}','{$this->LoginPatient}','{$this->Password}')";
            if ($this->cnx->exec($req))
                return true;
            else
                return false;
        } else
            return false;
    }

    public function UpdatePatient()
    {
        $r = $this->FindPatient($this->NumPatient);
        if ($r != null) {
            $req = "update Patient set Nom = '{$this->Nom}',Prenom = '{$this->Prenom}',DateNaissance = '{$this->DateNaissance}',
                    Tel = '{$this->Tel}',LoginPatient = '{$this->LoginPatient}' where NumPatient = {$this->NumPatient}";
            if ($this->cnx->exec($req))
                return true;
            else
                return false;
        } else
            return false;
    }

}
