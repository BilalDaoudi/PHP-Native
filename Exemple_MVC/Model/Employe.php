<?php
require "ConnexionBD.php";

class Employe extends ConnexionDB
{
    public int $Matricule;
    public string $Nom;
    public string $prenom;
    public string $DateNaissance;
    public float $Salaire;

    function __construct($db, $server, $user, $pass)
    {
        parent::__construct($db, $server, $user, $pass);
        $this->Table = "Employe";
    }

    public function FindEmploye($mat)
    {
        $this->ToConnecte();
        $req = "select * from employe where matricule = $mat";
        $r = $this->cnx->query($req)->fetch();
        if ($r)
            return $r;
        else
            return null;
    }

    public function AddEmploye()
    {
        $r = $this->FindEmploye($this->Matricule);
        if ($r == null) {
            $mat = $this->Matricule;
            $nom = $this->Nom;
            $pr = $this->prenom;
            $dt = $this->DateNaissance;
            $sal = $this->Salaire;
            $this->ToConnecte();
            $req_insert = "insert into employe values($mat,'$nom','$pr','$dt',$sal)";
            if ($this->cnx->exec($req_insert))
                return true;
            else
                return false;
        }
    }

    public function UpdateEmploye()
    {
        $r = $this->FindEmploye($this->Matricule);
        if ($r != null) {
            $mat = $this->Matricule;
            $nom = $this->Nom;
            $pr = $this->prenom;
            $dt = $this->DateNaissance;
            $sal = $this->Salaire;
            $this->ToConnecte();
            $req_update = "update employe set nom = '$nom' , prenom = '$pr' , DateNaissance = '$dt' , Salaire = $sal where Matricule = $mat";
            if ($this->cnx->exec($req_update))
                return true;
            else
                return false;
        }
    }

    public function DeleteEmploye($mat)
    {
        $r = $this->FindEmploye($mat);
        if ($r != null) {
            $this->ToConnecte();
            $req_delete = "delete from employe where Matricule = $mat";
            if ($this->cnx->exec($req_delete))
                return true;
            else
                return false;
        }
    }
}
