<?php
require "../Model/ConnexionDB.php";

if (isset($_POST["btnConnecte"])){
    $login = $_POST["tlogin"];
    $password = $_POST["tPassword"];
    if (!empty($login) and !empty($password)){
        ConnexionDB::Toconnecte();
        $st = ConnexionDB::$cnx->prepare("select * from admins where login = :login");
        $st->bindParam(":login",$login);
        $st->execute();
        $Admin = $st->fetch(); 
        if (count($Admin) != 0){
            if (password_verify($password,$Admin[1])){
                session_start();
                $_SESSION["Admin"] = $Admin;
                header("location:../Controller/Page_Liste_Categorie.php");
            }
        }

    }
}

require "../View/Page_Connecte_Admin.php";
?>