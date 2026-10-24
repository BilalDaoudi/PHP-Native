<?php
require "Connexion.php";

session_start();
if (isset($_POST["btnLogin"])){
    $login = $_POST["tLogin"];
    $pass = $_POST["tPassword"];
    if(!empty($login) && !empty($pass)){
        Connexion::ToConnecte();
        $requete = "select * from CompteAdministrateur where login = '$login' and MotPasse = '$pass'";
        $row = Connexion::$cnx->query($requete)->fetch();
        if ($row){
            $_SESSION["Admin"] = $row;
            header("location:espaceprivee.php");
        }
        else{
        echo "<script>alert('Les Données d\'authentification sont incorrects')</script>";

        }
    }
    else{
        echo "<script>alert('Les Données d\'authentification sont obligatoires')</script>";
    }
}






?>
<html>
    <head>
        <title>Authentification</title>
    </head>
    <body>
        
    <h1>Authentification</h1>
<form action="" method="post">
    Login <br>
    <input type="text" name="tLogin"><br><br>
    Password <br>
    <input type="password" name="tPassword"><br><br>
    <input type="submit" value="Log In" name="btnLogin">


</form>

    </body>
</html>