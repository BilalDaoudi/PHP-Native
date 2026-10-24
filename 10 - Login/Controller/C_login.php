<?php
require "../Model/M_Connexion.php";

$conx = new Connexion();
$conx->connexion();
$login = "";
$password = "";
$erreurlogin = "";
$erreurpass = "";
if (isset($_POST["btnConnecte"])) {
    $login = $_POST["username"];
    $password = $_POST["password"];
    $conx->connexion();
    $n = Connexion::$cnx->prepare("SELECT * from Admin where login = ?");
    $n->execute(array($login));
    $Admin = $n->fetch();
    if ($Admin) {
        if (password_verify($password,$Admin['motpass'])) {
            session_start();
            $_SESSION["Admin"] = $Admin;
            header("location:../Controller/C_Home.php");
        }else{
            $erreurlogin = "";
            $erreurpass = "Your password incorrect";
        }
    } else {
        $erreurlogin = "Your name incorrect";
        $erreurpass = "";
    }
}

$conx->Deconnexion();


require "../View/V_login.php";


?>