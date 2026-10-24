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
    $divPrin = "<div class='Articles' id='Articles'>";
    foreach ($Articles as $cat) {
        $img = "../" . $cat[2];
        $div = "<div class='Art'>";
        $div .= "<img src='$img' >";
        $div .= "<p>$cat[1]</p>";
        $div .= "<p> <span id='lpr'>Prix : $cat[3] </span><br><br> <span id='lqt'> Quantité </span> : <input type='number' name='$cat[0]' class='qt' > <br><br>
        <input type='submit' value='Ajouter Au Panier' class='btnAjouter'></p>";
        $div .= "</div>";
        $divPrin .= $div;
    }
    $divPrin .= "</div>";
    ConnexionDB::Desconnecte();
} else
    header("location:../Controller/Page_Principale.php");



require "../View/Page_Categorie.php";
