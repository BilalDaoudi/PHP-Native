<?php


require "ConnexionDB.php";
Connexion::Connecte();
$nblignes = Connexion::$cnx->query("select count(*) as 'NbEmploye' from employe")->fetchAll();
Connexion::Deconnecte();
$nb_employe_page = 4;
$nb_page = intval($nblignes[0][0] / $nb_employe_page);
$nb_page_fin = 0;
if ($nblignes[0][0] % $nb_employe_page != 0) {
    $nb_page++;
    $nb_page_fin = $nblignes[0][0] % $nb_employe_page;
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        input {
            border: none;
            background: none;
            color: blue;

        }

        input:active {
            color: red;
        }
    </style>
</head>

<body>
    <table width="100%" border="1">
        <tr>
            <th>Matricule</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Date de Naissance</th>
            <th>Salaire</th>
        </tr>
        <?php


        if (!empty($_GET)) {
            
            $indice = $nb_employe_page * $_GET["page"] - $nb_employe_page;
            Connexion::Connecte();
            $employes = Connexion::$cnx->query("select * from employe order by Matricule limit $indice,$nb_employe_page")->fetchAll();
            Connexion::Deconnecte();
            for ($j = 0; $j < count($employes); $j++) {
                $employe = $employes[$j];
                echo "<tr>
                        <td>$employe[0]</td>
                        <td>$employe[1]</td>
                        <td>$employe[2]</td>
                        <td>$employe[3]</td>
                        <td>$employe[4]</td>
                    </tr>";
            }
        }
        else{
            header("location:Affiche_GET.php?page=1");
        }

        ?>


    </table>

    <?php

    echo "<form action='Affiche_GET.php' method='GET'>";
    for ($i = 1; $i <= $nb_page; $i++) {
        echo "<a href='Affiche_GET?page=$i.php'><input type='submit' value='$i' name='page' /> </a> ";
    }
    echo "<form>";


    ?>

</body>

</html>