<?php
session_start();
require "../Model/ConnexionDB.php";

ConnexionDB::Toconnecte();
$categories = ConnexionDB::$cnx->query("select * from Categorie")->fetchAll();
$divPrin = "<div class='Categories' id='Categories'>";
foreach($categories as $cat){
    $a = "<a href='../Controller/Page_Categorie.php?cat=$cat[0]' class='Cate'>";
    $img = "../".$cat[2];
    $div = "<div class='Cat'>";
    $div .= "<p>$cat[1]</p>";
    $div .= "<img src='$img' >";
        $div .= "</div>";
    $a .= $div;
    $a .= "</a>";
    $divPrin .= $a;
}
$divPrin .= "</div>";
ConnexionDB::Desconnecte();
require "../View/Page_Principale.php";
?>



