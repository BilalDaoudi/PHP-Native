<?php
require "Connexion.php";
Connexion::ToConnecte();
session_start();
if (isset($_POST["btndeconnecte"])){
    session_unset();
    session_destroy();
}
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $req = "delete from Stagiaire where IdStagiaire = $id";
    Connexion::$cnx->exec($req);
    header("location:espaceprivee.php");
}


if (isset($_SESSION["Admin"])) {
    $nom = $_SESSION["Admin"][2];
    $pr = $_SESSION["Admin"][3];
    $time_sys = date("H");
    if ($time_sys > 6 and $time_sys < 19)
        $mes = "Bounjour";
    else
        $mes = "Bonsoir";


    $requete = "select st.Nom, st.Prenom , st.DateNaissance , st.PhotoProfil , f.Intitule ,st.IdStagiaire from Stagiaire st
    inner join Filiere f on st.IdFiliere = f.IdFiliere";

    $rows = Connexion::$cnx->query($requete)->fetchAll();

    $tbl = "<table width='100%' border='1'>
                <tr>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Date de Naissance</th>
                    <th>Photo Profil</th>
                    <th>Filiere</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>";

    $conf = "return confirm('sure ?')";
    foreach ($rows as $r) {
        $tbl .= '<tr>
                <td>'.$r[0].'</td>
                <td>'.$r[1].'</td>
                <td>'.$r[2].'</td>
                <td><img src="'.$r[3].'" width="100">'.'</td>
                <td>'.$r[4].'</td>
                <td><a href="ModifierStagiaire.php?id='.$r[5].'"><button>Modifier</button></a></td>
                <td><a href="espaceprivee.php?id='.$r[5].'"><button onclick="'.$conf.'">Supprimer</button></td>
            </tr>';
    }
    $tbl .= "</table>";
} else {
    header("location:Authentification.php");
}


?>





<html>

<head>
    <title>Authentification</title>
</head>

<body>
    <form action="" method="post">
        <input type="submit" value="Se déconnecte" name="btndeconnecte"><br>
    </form>
    <?php echo $mes . "  " . $nom . " " . $pr; ?><br>
    <a href="InsererStagiaire.php"> <button>Ajouter</button> </a><br>
    <?php echo $tbl; ?><br>




</body>

</html>