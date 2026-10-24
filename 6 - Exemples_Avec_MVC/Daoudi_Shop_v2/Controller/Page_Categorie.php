<?php

session_start();
if (count($_POST) != 0) {
    $T_keys = array_keys($_POST);
    foreach ($T_keys as $key) {
        if (!empty($_POST[$key])) {
            $Art = [$key, $_POST[$key]];
            $_SESSION["Articles"][] = $Art;
        }
    }
}

require "../Model/ConnexionDB.php";

if (isset($_GET["cat"])) {
    $cat = $_GET["cat"];
    ConnexionDB::Toconnecte();
    $Articles = ConnexionDB::$cnx->query("select * from Article where IdCategorie = $cat")->fetchAll();
    $divPrin = "<div class='row' id='Articles'>";
    foreach ($Articles as $cat) {
        
        $img = "../" . $cat[2];
        $div = "<div class='col-sm-2'>";
        $div .= "<div class='bgImg'>";
        $div .= "<img class='card-img-bottom' src='$img' >";
        $div .= "</div>";
        $div .= "<p class='description'>$cat[1]</p>";
        $div .= "<div class='PrQt'> <center> <span class='ArtPrix'> Prix :  $cat[3] DH </span></br></br><div class='AddQt row'> <input type='number' name='$cat[0]' onkeyup='Quantite_Article(this)' class='qt'>
        <input type='submit' value='+' class='btnAjouter'></div></center></div>";
        $div .= "</div>";
        $divPrin .= $div;
    }
    $divPrin .= "</div>";
    ConnexionDB::Desconnecte();
} else
    header("location:../Controller/Page_Principale.php");



require "../View/Page_Categorie.php";
