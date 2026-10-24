<?php
require "Connexion.php";
class Produit extends Connexion{
    public $ref;
    public $libelle;
    public $prix;
    public $dateAchat;
    public $photoProduit;
    public $idCategorie;

    function __construct()
    {
    }

    public function getAll(){
        self::Toconnecte();
        $rows = self::$cnx->query("select * from Produit")->fetchAll();
        return $rows;
    }

    public function FindProduit($ref){
        self::Toconnecte();
        $row = self::$cnx->query("select * from Produit where reference = '$ref'")->fetchAll();
        return $row;
    }

    public function DeleteProduit($ref){
        self::Toconnecte();
        $n = self::$cnx->exec("delete from Produit where reference = '$ref'");
        if ($n == 1){
            return true;
        }else{
            return false;
        }
    }

    public function AddProduit(){
        self::Toconnecte();
        $ref = $this->ref;
        $lib = $this->libelle;
        $prix = $this->prix;
        $dt = $this->dateAchat;
        $photo = $this->photoProduit;
        $cat = $this->idCategorie;

        $n = self::$cnx->exec("insert into produit values ('$ref','$lib',$prix,'$dt','$photo',$cat)");
        if ($n == 1){
            return true;
        }else{
            return false;
        }
    }



}




?>