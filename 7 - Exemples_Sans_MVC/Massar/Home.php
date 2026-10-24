<?php
require "ConnexionDB.php";
session_start();
$_SESSION["Ni"] = 0;
$_SESSION["Matricule"] = 0;


if (isset($_POST["btnLogin"])) {
    if (!empty($_POST['tLogin']) and !empty($_POST['tPassword']) and isset($_POST['tRole'])) {
        $user = $_POST['tLogin'];
        $password = $_POST['tPassword'];
        $role = $_POST['tRole'];
        if ($role == "Stagiaire") {
            Connexion::Connecte();
            $_SESSION["stagiaire"] = Connexion::$cnx->query("select * from Stagiaire where email = '$user'")->fetchAll();
            Connexion::Deconnecte();
            if (count($_SESSION["stagiaire"]) > 0) {
                $pass = $_SESSION["stagiaire"][0][6];
                if (password_verify($password, $pass)) {
                    header("location:PageStagiaire.php");
                    $_SESSION["Ni"] = $_SESSION['stagiaire'][0][0];
                } else
                    echo "<script>alert('Erreurs')</script>";
            } else
                echo "<script>alert('Email n\'est existe')</script>";
        } else {
            Connexion::Connecte();

            $_SESSION["formateur"] = Connexion::$cnx->query("select * from Formateur where Matriculeformateur = $user")->fetchAll();
            Connexion::Deconnecte();
            if (count($_SESSION["formateur"]) > 0) {
                $pass = $_SESSION["formateur"][0][4];
                if (password_verify($password, $pass)) {
                    header("location:PageEvaluationsByFormateur.php");
                    $_SESSION["Matricule"]=$_SESSION['formateur'][0][0];
                } else
                    echo "<script>alert('Erreurs')</script>";
            } else
                echo "<script>alert('Matricule n\'est existe')</script>";
        }
    } else {
        echo "<script>alert('Erreurs')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
</head>

<body>
    <form action="Home.php" method="post">
        Login &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input type="text" name="tLogin">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="radio" name="tRole" value="Stagiaire"> Stagiaire
        <input type="radio" name="tRole" value="Formateur"> Formateur
        <br>
        <br>
        Password : <input type="password" name="tPassword">
        <br>
        <br>
        <input type="submit" name="btnLogin" value="Log In">
    </form>
</body>

</html>