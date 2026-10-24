<?php
require "../Model/Patient.php";

if (isset($_POST["btnInscription"])) {
    $num = $_POST["btnInscription"];
    $nom = $_POST["tNom"];
    $prenom = $_POST["tPrenom"];
    $DateNaissance = $_POST["tDateNaissance"];
    $tel = $_POST["tTel"];
    $login = $_POST["tLoginPatient"];
    $password = $_POST["tPassword"];
    $confirme = $_POST["tConfirme"];
    if (!empty($num) and !empty($nom) and !empty($prenom) and !empty($DateNaissance) and !empty($tel) and !empty($login) and !empty($password) and !empty($confirme)) {
        if ($password == $confirme) {
            $cryp_pass = password_hash($password, PASSWORD_DEFAULT);
            $Patient = new Patient("Clinique");
            $Patient->ToConnecte();
            $Patient->NumPatient = $num;
            $Patient->Nom = $nom;
            $Patient->Prenom = $prenom;
            $Patient->DateNaissance = $DateNaissance;
            $Patient->Tel = $tel;
            $Patient->LoginPatient = $login;
            $Patient->Password = $cryp_pass;

            $aj = $Patient->AddPatient();
            if ($aj) {
                echo "<script>alert('Vous Avez Inscris Avec Sucées')</script>";
                header("location:Connecte_User.php");
            } else
                echo "<script>alert('Erreur')</script>";
        } else
            echo "<script>alert('Confirme Ton Mot de Passe')</script>";
    } else
        echo "<script>alert('Tous Les Champs Obligatoire')</script>";
}



require "../View/InscriptionPatient.php";
