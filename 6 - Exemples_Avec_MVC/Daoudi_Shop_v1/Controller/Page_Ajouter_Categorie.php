<?php
require "../Model/Categorie.php";

$Cat = new Categorie();

session_start();
if (isset($_POST["btnDaconnecte"])){
    session_unset();
    session_destroy();
}
if (isset($_SESSION["Admin"])) {
    if (isset($_POST["btnAjouter"])) {
        if (!empty($_POST["tdescription"]) and !empty($_FILES['tphoto']['name'])){
        $name_exten = explode(".",$_FILES['tphoto']['name']);
        $Cat->DescriptionCat = $_POST["tdescription"];
        $Cat->PhotoCategorie = "Photo_E-Commerce/" .$_POST["tdescription"].".".$name_exten[1];
        $Bool_Update = $Cat->AddCategorie();
        if ($Bool_Update) {
            echo "<script>alert('Categorie est Ajouté Avec Succées')</script>";
            move_uploaded_file($_FILES['tphoto']['tmp_name'], "../Photo_E-Commerce/" .$_POST["tdescription"].".".$name_exten[1]);
        }
        else
            echo "<script>alert('Categorie n\'est pas Ajouté : * Code Article n\'est pas répéter')</script>";

}
else
    echo "<script>alert('Tous Les Champs Obligatoires')</script>";

    }

}

else
    header("location:../controller/Page_Connecte_Admin.php");

require "../View/Page_Ajouter_Categorie.php";



?>