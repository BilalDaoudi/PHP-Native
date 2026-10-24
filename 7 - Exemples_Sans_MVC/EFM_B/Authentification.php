<?php

session_start();
if (isset($_POST["btnLogin"])) {
    $login = $_POST["tLogin"];
    $pass = $_POST["tPassword"];
    if (!empty($login) && !empty($pass)) {
        $cnx = new PDO("mysql:host=localhost;dbname=gestionproduit_v2", "root", "");

        $row = $cnx->query("select * from compteproprientaire where loginProp = '$login'")->fetch();
        if ($row) {
            $pass_hash = $row[1];
            if (password_verify($pass, $pass_hash) == true) {
                $_SESSION['user'] = $row;
                header("location:accueil.php");
            } else
                echo "<script>alert(' Erreur de login/mot de passe. ')</script>";
        } else
            echo "<script>alert(' Erreur de login/mot de passe. ')</script>";
    } else {
        echo "<script>alert('Veuillez saisir un login et un mot de passe')</script>";
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