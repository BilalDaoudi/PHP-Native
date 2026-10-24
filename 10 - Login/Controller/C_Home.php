<?php 
session_start();

if (isset($_POST["btndeconnexion"])) {
    session_unset();
    session_destroy();
}

if (!isset($_SESSION["Admin"]))
    header("location:../Controller/C_login.php");



require "../View/V_Home.php";
?>