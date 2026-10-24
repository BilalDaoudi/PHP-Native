<?php
require "connexion.php";

class Personne extends Connexion
{
    public $id;
    public $photo;
    public $nom;
    public $matricule;
    public $genre;
    public $datenaissance;

    function __construct()
    {
    }

    public function all()
    {
        $rows = [];
        try {
            $this->connexion();
            $n = Connexion::$cnx->prepare("call get_personnes()");
            $n->execute();
            $rows = $n->fetchAll(PDO::FETCH_NUM);
            $this->Deconnexion();
        } catch (Exception $ex) {
            $rows = [];
        }
        return $rows;
    }

    public function add()
    {
        $n = null;
        try {
            $this->connexion();
            $n = Connexion::$cnx->prepare("call add_personne(?,?,?,?,?)");
            $n->execute(array($this->photo, $this->nom, $this->matricule,  $this->genre, $this->datenaissance));
            $this->Deconnexion();
        } catch (Exception $ex) {
            $n = null;
        }
        return $n;
    }

    public function update_with_photo()
    {
        $n = null;
        try {
            $this->connexion();
            $n = Connexion::$cnx->prepare("call update_personne_with_photo(?,?,?,?,?,?)");
            $n->execute(array($this->id, $this->photo, $this->nom, $this->matricule,  $this->genre, $this->datenaissance));
            $this->Deconnexion();
        } catch (Exception $ex) {
            $n = null;
        }
        return $n;
    }


    
    public function update()
    {
        $n = null;
        try {
            $this->connexion();
            $n = Connexion::$cnx->prepare("call update_personne(?,?,?,?,?)");
            $n->execute(array($this->id, $this->nom, $this->matricule,  $this->genre, $this->datenaissance));
            $this->Deconnexion();
        } catch (Exception $ex) {
            $n = null;
        }
        return $n;
    }

    public function delete()
    {
        $n = null;
        try {
            $this->connexion();
            $n = Connexion::$cnx->prepare("call delete_personne(?)");
            $n->execute(array($this->id));
            $this->Deconnexion();
        } catch (Exception $ex) {
            $n = null;
        }
        return $n;
    }

    public function personne_update()
    {
        $row = [];
        try {
            $this->connexion();
            $n = Connexion::$cnx->prepare("select * from personnes where id = ?");
            $n->execute(array($this->id));
            $row = $n->fetch(PDO::FETCH_NUM);
            $this->Deconnexion();
        } catch (Exception $ex) {
            $row = [];
        }
        return $row;
    }       


  


    public function ForceDelete()
    {
        // $n = null;
        // try {
        //     $this->connexion();
        //     $n = Connexion::$cnx->prepare("call ForceDeleteClient(?)");
        //     $n->execute(array($this->CodeClient));
        //     $this->Deconnexion();
        // } catch (Exception $ex) {
        //     $n = null;
        // }
        // return $n;
    }

   
    public function Restore()
    {
        // $n = null;
        // try {
        //     $this->connexion();
        //     $n = Connexion::$cnx->prepare("call RestoreClient(?)");
        //     $n->execute(array($this->CodeClient));
        //     $this->Deconnexion();
        // } catch (Exception $ex) {
        //     $n = null;
        // }
        // return $n;
    }
    public function GetAllArchivage()
    {
        // $rows = [];
        // try {
        //     $this->connexion();
        //     $n = Connexion::$cnx->prepare("call GetAllArchivageClient()");
        //     $n->execute();
        //     $rows = $n->fetchAll(PDO::FETCH_NUM);
        //     $this->Deconnexion();
        // } catch (Exception $ex) {
        //     $rows = [];
        // }
        // return $rows;
    }

   
   
}
