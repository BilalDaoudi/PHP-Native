<?php
require "../model/ConnexionDB.php";

class Client extends ConnexionDB
{
    public $IdClient;
    public $Nom;
    public $Prenom;
    public $DateNaissance;
    public $Sexe;
    public $Ville;
    public $Adresse;
    public $Codepostale;
    public $Telefone;
    public $Email;
    public $Mot_Pass;

    function __construct($db, $server, $user, $pass)
    {
        parent::__construct($db, $server, $user, $pass);
        $this->Table = "Client";
    }

    public function FindClient($id)
    {
        $this->ToConnecte();
        $req = "select * from Client where IdClient = $id";
        $r = $this->cnx->query($req)->fetch();
        if ($r)
            return $r;
        else
            return null;
    }

    public function ConnecteClient($idClient)
    {
        $requete = "select * from Client where IdClient=$idClient";
        $Client = $this->cnx->query($requete)->fetch();
        return $Client;
    }




    public function AddClient()
    {
        $r = $this->FindClient($this->IdClient);
        if ($r == null) {
            $id = $this->IdClient;
            $nom = $this->Nom;
            $pr = $this->Prenom;
            $dt = $this->DateNaissance;
            $sexe = $this->Sexe;
            $ville = $this->Ville;
            $Adresse = $this->Adresse;
            $CodePostal = $this->Codepostale;
            $tel = $this->Telefone;
            $email = $this->Email;
            $password = $this->Mot_Pass;
            $this->ToConnecte();
            $req_insert = "insert into Client values($id,'$nom','$pr','$dt','$sexe','$ville','$Adresse','$CodePostal','$tel','$email','$password')";
            if ($this->cnx->exec($req_insert))
                return true;
            else
                return false;
        }
    }

    public function UpdateClient()
    {
        $r = $this->FindClient($this->IdClient);
        if ($r != null) {
            $id = $this->IdClient;
            $nom = $this->Nom;
            $pr = $this->Prenom;
            $dt = $this->DateNaissance;
            $sexe = $this->Sexe;
            $ville = $this->Ville;
            $Adresse = $this->Adresse;
            $CodePostal = $this->Codepostale;
            $tel = $this->Telefone;
            $email = $this->Email;
            $this->ToConnecte();
            $req_update = "update Client set nom = '$nom' , prenom = '$pr' , DateNaissance = '$dt' , Sexe = $sexe, Ville = $ville, Adresse = $Adresse, CodePostale = $CodePostal
            , Telefone = $tel, Email = $email where IdClient = $id";
            if ($this->cnx->exec($req_update))
                return true;
            else
                return false;
        }
    }

    public function DeleteClient($id)
    {
        $r = $this->FindClient($id);
        if ($r != null) {
            $this->ToConnecte();
            $req_delete = "delete from Client where IdClient = $id";
            if ($this->cnx->exec($req_delete))
                return true;
            else
                return false;
        }
    }
}
