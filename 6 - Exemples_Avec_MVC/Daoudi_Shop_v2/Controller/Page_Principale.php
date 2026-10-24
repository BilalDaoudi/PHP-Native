<?php
session_start();
require "../Model/ConnexionDB.php";

ConnexionDB::Toconnecte();
$categories = ConnexionDB::$cnx->query("select * from Categorie")->fetchAll();
$divPrin = "<div class='row' id='Categories'>";
foreach($categories as $cat){
    $img = "../".$cat[2];
    $div = "<div class='col-sm-4'>";
    $a = "<a href='../Controller/Page_Categorie.php?cat=$cat[0]' class='Cate'>";
    $a .= "<div class='card-body'><h1>$cat[1]</h1></div>";
    $a .= "<img class='card-img-bottom' src='$img' >";
    $a .= "</a>";
    $div .= $a;
    $div .= "</div>";
    $divPrin .= $div;

}
$divPrin .= "</div>";
ConnexionDB::Desconnecte();
require "../View/Page_Principale.php";
?>



