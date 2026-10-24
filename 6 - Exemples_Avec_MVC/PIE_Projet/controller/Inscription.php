<?php
require "../model/Client.php";

$client = new Client("candles", "localhost", "root", "");

if (isset($_POST["btnInscription"])) {
    if (isset($_POST["tSexe"])) {
        $id = $_POST["tId"];
        $nom = $_POST["tNom"];
        $pr = $_POST["tPrenom"];
        $dt = $_POST["tDateNaissance"];
        $sexe = $_POST["tSexe"];
        $ville = $_POST["tVille"];
        $Adresse = $_POST["tAdresse"];
        $CodePostal = $_POST["tCodepostale"];
        $tel = $_POST["tTelefone"];
        $email = $_POST["tEmail"];
        $password = $_POST["tPassword"];
        $confirme = $_POST["tConfirme"];
        if (!empty($id) and !empty($nom) and !empty($pr) and !empty($dt) and !empty($ville) and !empty($Adresse) and !empty($CodePostal) and !empty($tel) and !empty($email) and !empty($password) and !empty($confirme)) {
            if ($password == $confirme) {
                $pass_cryp = password_hash($password, PASSWORD_DEFAULT);
                $client->IdClient = $id;
                $client->Nom = $nom;
                $client->Prenom = $pr;
                $client->Sexe = $sexe;
                $client->DateNaissance = $dt;
                $client->Ville = $ville;
                $client->Adresse = $Adresse;
                $client->Codepostale = $CodePostal;
                $client->Telefone = $tel;
                $client->Email = $email;
                $client->Mot_Pass = $pass_cryp;
                if ($client->AddClient())
                    echo "<script>alert('Inscription avec Succées')</script>";
                    header("location:../controller/Connecte_User.php");
            } else
                echo "<script>alert('Confermé Ton Mot de passe')</script>";
        } else
            echo "<script>alert('Tou Les Champs Obligatoire')</script>";
    } else
        echo "<script>alert('Choisir Sexe')</script>";
}



















require "../view/page_Inscription.php";
