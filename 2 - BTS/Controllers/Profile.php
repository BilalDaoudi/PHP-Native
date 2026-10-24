<?php
require "../Models/Profile.php";
session_start();


if (!isset($_SESSION["User"]))
    header("location:Login.php");



$_SESSION['Page_Actual'] = 'Profile';

$profile = new Profile();






if (isset($_POST["actualpassword"]) and isset($_POST["password1"]) and isset($_POST["password2"])) {
    if (password_verify($_POST["actualpassword"], $_SESSION["User"][9])) {
        if ($_POST["password2"] == $_POST["password1"]) {
            $profile->ChangePassword($_SESSION["User"][0],password_hash($_POST["password1"],PASSWORD_DEFAULT));
            echo 'Mot de passe a été modifié avec succées';
        } else {
            echo "Confirmer Mot d passe !!!";
        }
    } else {
        echo "Mot de passe actual incorrect !!!";
    }
} else
    require "../Views/Profile.php";
