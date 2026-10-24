<?php
require "../model/Client.php";

$client = new Client("candles", "localhost", "root", "");
$client->ToConnecte();
session_start();

if (isset($_POST["btnConnexion"])) {
    $Id = $_POST["tIdClient"];
    $Password = $_POST["tPassword"];
    if (!empty($Id) and !empty($Password)) {
        if ($client->ConnecteClient($Id) != null) {
            $User = $client->ConnecteClient($Id);
            if (password_verify($Password, $User[10])) {
                $_SESSION["client"] = $User;
                header("location:../controller/User.php");
            } else
                echo "<script>alert('Erreur Mot de Passe')</script>";
        } else
            echo "<script>alert('Erreur Id')</script>";
    } else
        echo "<script>alert('Enter Id Et Mot de passe')</script>";
}
require "../view/Home.php";
