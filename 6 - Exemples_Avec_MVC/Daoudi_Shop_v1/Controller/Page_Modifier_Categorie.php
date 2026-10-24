<?php
require "../Model/Categorie.php";
$Categorie = new Categorie();
session_start();
if (isset($_POST["btnDaconnecte"])) {
    session_unset();
    session_destroy();
}


if (isset($_SESSION["Admin"])) {

    if (isset($_GET["idCat"])) {
        if (isset($_POST["btnModifier"])) {
            if (!empty($_POST["tdescription"]) and !empty($_FILES['tphoto']['name'])) {
                $name_exten = explode(".", $_FILES['tphoto']['name']);
                $idCat = $_GET["idCat"];
                $Categorie->DescriptionCat = $_POST["tdescription"];
                $Categorie->PhotoCategorie = "Photo_E-Commerce/" . $_POST["tdescription"] . "." . $name_exten[1];
                $Bool_Update = $Categorie->UpdateCategorie($idCat);
                if ($Bool_Update) {
                    echo "<script>alert('Categorie est Modifié Avec Succées')</script>";

                    move_uploaded_file($_FILES['tphoto']['tmp_name'], "../Photo_E-Commerce/" . $_POST["tdescription"] . "." . $name_exten[1]);
                } else
                    echo "<script>alert('Categorie n\'est pas Ajouté : * Code Article n\'est pas répéter')</script>";
            } else
            echo "<script>alert('Tous Les Champs Obligatoires')</script>";
        }
    } else {
        header("location:../Controller/Page_Liste_Categorie.php");
    }
} else
    header("location:../Controller/Page_Connecte_Admin.php");
require "../View/Page_Modifier_Categorie.php";


?>