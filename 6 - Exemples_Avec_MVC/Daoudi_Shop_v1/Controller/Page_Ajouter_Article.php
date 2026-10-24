<?php

require "../Model/Article.php";

$Article = new Article();


session_start();
if (isset($_POST["btnDaconnecte"])) {
    session_unset();
    session_destroy();
}
if (isset($_SESSION["Admin"])) {
    Article::Toconnecte();
    $select = "<select name='idCat' > <option>Choisir Categorie<option>";
    $T_IdCat = Article::$cnx->query("select * from Categorie")->fetchAll();
    foreach ($T_IdCat as $id) {
        $select .= "<option value='$id[0]'>$id[1]</option>";
    }
    $select .=  "</select>";


    if (isset($_POST["btnAjouter"])) {
        if (!empty($_POST["idCat"]) and !empty($_POST["tcode"]) and !empty($_POST["tdescription"]) and !empty($_POST["tprix"]) and !empty($_POST["tquantite"]) and !empty($_FILES['tphoto']['name'])) {
            $name_exten = explode(".", $_FILES['tphoto']['name']);
            $Article->IdCategorie = $_POST["idCat"];
            $Article->CodeArticle = $_POST["tcode"];
            $Article->DescriptionArticle = $_POST["tdescription"];
            $Article->PhotoArticle = "Photo_E-Commerce/" . $_POST["tcode"] . "." . $name_exten[1];
            $Article->Prix_Unitaire = $_POST["tprix"];
            $Article->QuantiteStocke = $_POST["tquantite"];
            $Bool_Add = $Article->AddArticle();
            if ($Bool_Add) {
                echo "<script>alert('Article est Ajouté Avec Succées')</script>";
                move_uploaded_file($_FILES['tphoto']['tmp_name'], "../Photo_E-Commerce/" . $_POST["tcode"] . "." . $name_exten[1]);
            } else
                echo "<script>alert('Article n\'est pas Ajouté : * Code Article n\'est pas répéter')</script>";
        } else
            echo "<script>alert('Tous Les Champs Obligatoires')</script>";
    }
} else
    header("location:../controller/Page_Connecte_Admin.php");



require "../View/Page_Ajouter_Article.php";
