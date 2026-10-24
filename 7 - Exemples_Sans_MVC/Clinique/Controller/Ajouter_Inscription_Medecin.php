<?php
require "../Model/Medecin.php";
$medecin = new Medecin("clinique");
$medecin->ToConnecte();

if (isset($_POST["btnInscription"])) {
    $num = $_POST["btnInscription"];
    $nom = $_POST["tNom"];
    $prenom = $_POST["tPrenom"];
    $specialite = $_POST["tSpecialite"];
    $tel = $_POST["tTel"];
    $login = $_POST["tLoginMedecin"];
    $password = $_POST["tPassword"];
    $confirme = $_POST["tConfirme"];
    if (!empty($num) and !empty($nom) and !empty($prenom) and !empty($specialite) and !empty($tel) and !empty($login) and !empty($password) and !empty($confirme)) {
        if ($password == $confirme) {
            $cryp_pass = password_hash($password, PASSWORD_DEFAULT);


            $medecin->NumMedecin = $num;
            $medecin->Nom = $nom;
            $medecin->Prenom = $prenom;
            $medecin->Specialite = $specialite;
            $medecin->Tel = $tel;
            $medecin->LoginMedecin = $login;
            $medecin->Password = $cryp_pass;

            $aj = $medecin->AddMedecin();
            print_r($aj);
            /*if ($aj) {
                echo "<script>alert('Vous Avez Inscris Avec Sucées')</script>";
                header("location:Connecte_User.php");
            } else
                echo "<script>alert('Erreur')</script>";
              */  
        } 
        else
            echo "<script>alert('Confirme Ton Mot de Passe')</script>";
            
    } else
        echo "<script>alert('Tous Les Champs Obligatoire')</script>";


}





require "../View/InscriptionMedecin.php";
