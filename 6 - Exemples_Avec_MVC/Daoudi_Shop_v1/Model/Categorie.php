<?php

require "../Model/ConnexionDB.php";

class Categorie extends ConnexionDB
{
    public $DescriptionCat;
    public $PhotoCategorie;
    function __construct()
    {
    }

    public function GetAll()
    {
        parent::Toconnecte();
        $rows = parent::$cnx->query("select * from Categorie")->fetchAll();
        parent::Desconnecte();
        return $rows;
    }

    public function FindCategorie($idCat)
    {
        parent::Toconnecte();
        $row = parent::$cnx->query("select * from Categorie where IdCategorie = $idCat")->fetch();
        parent::Desconnecte();
        return $row;
    }

    public function AddCategorie()
    {
        parent::Toconnecte();
        $query = "insert into Categorie(DescriptionCat,PhotoCategorie) VALUES('{$this->DescriptionCat}','{$this->PhotoCategorie}') ";
        $n = parent::$cnx->exec($query);
        if ($n)
            return true;
        else
            return false;
    }
    public function DeleteCategorie($idCat)
    {
        parent::Toconnecte();
        $n = parent::$cnx->exec("delete from Categorie where IdCategorie = $idCat");
        if ($n)
            return true;
        else
            return false;
    }
    public function UpdateCategorie($idCat)
    {
        parent::Toconnecte();
        $query = "Update Categorie set DescriptionCat = '{$this->DescriptionCat}' ,  PhotoCategorie = '{$this->PhotoCategorie}' 
            where IdCategorie = $idCat ";
        $n = parent::$cnx->exec($query);
        if ($n)
            return true;
        else
            return false;
    }
}


?>
