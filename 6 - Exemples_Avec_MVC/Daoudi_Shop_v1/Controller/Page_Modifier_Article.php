<?php

require "../Model/Article.php";

$Article = new Article();
session_start();
if (isset($_POST["btnDaconnecte"])) {
    session_unset();
    session_destroy();
}




if (isset($_SESSION["Admin"])) {
    
    if (isset($_GET["UpCodeArt"])) {
        if (isset($_POST["btnModifier"])) {
            if (!empty($_POST["tdescription"]) and !empty($_POST["tprix"]) and !empty($_POST["tquantite"]) and !empty($_FILES['tphoto']['name'])) {

                $name_exten = explode(".", $_FILES['tphoto']['name']);
                $Article->IdCategorie = $_GET["idCat"];
                $Article->CodeArticle = $_POST["tcode"];
                $Article->DescriptionArticle = $_POST["tdescription"];
                $Article->PhotoArticle = "Photo_E-Commerce/" . $_POST["tcode"] . "." . $name_exten[1];
                $Article->Prix_Unitaire = $_POST["tprix"];
                $Article->QuantiteStocke = $_POST["tquantite"];
                $Bool_Update = $Article->UpdateArticle();
                if ($Bool_Update) {
                    echo "<script>alert('Categorie est Modifié Avec Succées')</script>";
                    move_uploaded_file($_FILES['tphoto']['tmp_name'], "../Photo_E-Commerce/" . $_POST["tcode"] . "." . $name_exten[1]);
                } else
                    echo "<script>alert('Article n\'est pas Ajouté : * Code Article n\'est pas répéter')</script>";
            } else
                echo "<script>alert('Tous Les Champs Obligatoires')</script>";
        }
    } else
        header("location:../controller/Page_Connecte_Admin.php");
} else
    header("location:../controller/Page_Connecte_Admin.php");




require "../View/Page_Modifier_Article.php";

?>
