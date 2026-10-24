<?php

require "../model/Client.php";
session_start();



if (isset($_POST["btnDeconnexion"])){
    $_SESSION["client"] = null;
}


if (isset($_SESSION["client"]) and $_SESSION["client"] != null){
    $User = $_SESSION["client"];
}
if ($_SESSION["client"] == null){
    header("location:../controller/Connecte_User.php");
}
















require "../view/Page_Client.php";
