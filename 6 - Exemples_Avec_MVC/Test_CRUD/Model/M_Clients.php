<?php
require "../Model/M_Connexion.php";
require "../Model/IMethodeCRUD.php";

class ClientChienChat extends Connexion implements IMethodeCRUD
{
    public $Id;
    public $Nom;
    public $Prenom;
    public $Adresse;
    public $Telephone;
    
    function __construct()
    {
    }

    public function Add()
    {
        $n = null;
        try {
            $this->connexion();
            $n = Connexion::$cnx->prepare("call SP_AjouterClientChiensChats(?,?,?,?)");
            $n->execute(array($this->Nom,$this->Prenom,$this->Telephone,$this->Adresse));
            $this->Deconnexion();
        } catch (Exception $ex) {
        }
        return $n;
    }

    public function Update()
    {
        $n = null;
        try {
            $this->connexion();
            $n = Connexion::$cnx->prepare("call SP_ModifierClientChiensChats(?,?,?,?,?)");
            $n->execute(array($this->Id,$this->Nom,$this->Prenom,$this->Telephone,$this->Adresse));
            $this->Deconnexion();
        } catch (Exception $ex) {
        }
        return $n;
    }


    public function Delete()
    {
        $n = null;
        try {
            $this->connexion();
            $n = Connexion::$cnx->prepare("call SP_SupprimerClientChiensChats(?)");
            $n->execute(array($this->Id));
            $this->Deconnexion();
        } catch (Exception $ex) {
        }
        return $n;
    }

    public function GetAll()
    {
        $rows = [];
        try {
            $this->connexion();
            $rows = Connexion::$cnx->query("call SP_GetAllClientChienChat()")->fetchAll(PDO::FETCH_NUM);
            $this->Deconnexion();
        } catch (Exception $ex) {
        }
        return $rows;
    }

    public function Find($val)
    {
        $rows = [];
        try {
            $this->connexion();
            $rows = Connexion::$cnx->query("call SP_RechercherClientChiensChats(\"$val\")")->fetchAll(PDO::FETCH_NUM);
            $this->Deconnexion();
        } catch (Exception $ex) {
        }
        return $rows;
    }

    public function AddAnimal($Nom,$Espece,$Race,$Sexe,$DateNaissance,$NumIdentification,$sterilise)
    {
        $n = null;
        try {
            $this->connexion();
            $n = Connexion::$cnx->prepare("call SP_AjouterAnimalChiensChats(?,?,?,?,?,?,?,?)");
            $n->execute(array($this->Id,$Nom,$Espece,$Race,$Sexe,$DateNaissance,$NumIdentification,$sterilise));
            $this->Deconnexion();
        } catch (Exception $ex) {
        }
        return $n;
    }
}


