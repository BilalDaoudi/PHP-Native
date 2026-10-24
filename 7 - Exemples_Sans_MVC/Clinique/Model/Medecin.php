<?php
require "DataBase.php";
class Medecin extends Connexion
{
    public $NumMedecin = 0;
    public $Nom = "";
    public $Prenom = "";
    public $Specialite = "";
    public $Tel = "";
    public $LoginMedecin = "";
    public $Password = "";

    function __construct($db)
    {
        $this->dbname = $db;
    }

    public function ToConnecte()
    {
        $this->cnx = new PDO("mysql:host=" . $this->servername . ";dbname=" . $this->dbname, $this->user, $this->password);
    }
    public function DeConnecte()
    {
        $this->cnx = null;
    }


    public function GetAll()
    {
        $req = "select * from Medecin";
        $rows = $this->cnx->query($req)->fetchAll();
        return $rows;
    }

    public function ConnectMedecin($email,$pass)
    {
        $row = $this->cnx->query("select * from Medecin where loginMedecin = $email and pass = $pass")->fetch();
        if ($row)
            return $row;
        else
            return null;
    }

    public function FindMedecin($num)
    {
        $n = (int)($num);
        $row = $this->cnx->query("select * from Medecin where NumMedecin = $n")->fetch();
        if ($row)
            return $row;
        else
            return null;
    }

    public function AddMedecin()
    {
        $num = (int)($this->NumMedecin);
        $nom = $this->Nom;
        $pr = $this->Prenom;
        $sp = $this->Specialite;
        $tel = $this->Tel;
        $login = $this->LoginMedecin;
        $pass = $this->Password;
        $r = $this->FindMedecin($num);
        return $r;
        /*if ($r == null) {
            $req = "insert into Medecin values ($num,'$nom','$pr','$sp','$tel','$login','$pass')";
            if ($this->cnx->exec($req))
                return true;
            else
                return false;
        } else
            return false;
            */
    }

    public function UpdateMedecin()
    {
        $r = $this->FindMedecin($this->NumMedecin);
        if ($r != null) {
            $req = "update Medecin set Nom = '{$this->Nom}',Prenom = '{$this->Prenom}',Specialite = '{$this->Specialite}',
                    Tel = '{$this->Tel}',LoginMedecin = '{$this->LoginMedecin}' where NumMedecin = {$this->NumMedecin}";
            if ($this->cnx->exec($req))
                return true;
            else
                return false;
        } else
            return false;
    }
}
