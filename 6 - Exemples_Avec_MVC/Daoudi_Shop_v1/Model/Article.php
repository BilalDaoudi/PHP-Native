<?php

require "../Model/ConnexionDB.php";

class Article extends ConnexionDB
{
    public $CodeArticle;
    public $DescriptionArticle;
    public $PhotoArticle;
    public $Prix_Unitaire;
    public $QuantiteStocke;
    public $IdCategorie;


    function __construct()
    {
    }

    public function GetAll($idCat)
    {
        parent::Toconnecte();
        $rows = parent::$cnx->query("select * from Article where IdCategorie = $idCat")->fetchAll();
        return $rows;
    }

    public function FindArticle($CodeArt)
    {
        parent::Toconnecte();
        $row = parent::$cnx->query("select * from Article where CodeArticle = '$CodeArt'")->fetch();
        return $row;
    }

    public function AddArticle()
    {
        $existe = $this->FindArticle($this->CodeArticle);
        if ($existe == null) {
            parent::Toconnecte();
            $query = "insert into Article values('{$this->CodeArticle}','{$this->DescriptionArticle}',
            '{$this->PhotoArticle}',{$this->Prix_Unitaire},{$this->QuantiteStocke},{$this->IdCategorie})";
            $n = parent::$cnx->exec($query);
            if ($n)
                return true;
            else
                return false;
        }
    }
    public function DeleteArticle($CodeArt)
    {
        parent::Toconnecte();
        $n = parent::$cnx->exec("delete from Article where CodeArticle = '$CodeArt'");
        if ($n)
            return true;
        else
            return false;
    }
    public function UpdateArticle()
    {
        $existe = $this->FindArticle($this->CodeArticle);
        if ($existe != null) {
            parent::Toconnecte();
            $query = "Update Article set DescriptionArticle = '{$this->DescriptionArticle}' ,  PhotoArticle = '{$this->PhotoArticle}' ,
            Prix_Unitaire = {$this->Prix_Unitaire} , QuantiteStocke = {$this->QuantiteStocke} , IdCategorie = {$this->IdCategorie} 
            where CodeArticle = '{$this->CodeArticle}' ";
            $n = parent::$cnx->exec($query);
            if ($n)
                return true;
            else
                return false;
        }

    }
}


?>