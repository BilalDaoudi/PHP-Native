<?php
require "ConnexionDB.php";
Connexion::Connecte();
session_start();
$_SESSION["employes"] = Connexion::$cnx->query("select * from employe")->fetchAll();
Connexion::Deconnecte();

//print_r($_SESSION["employes"])

$nb_employe_page = 3;
$nb_page = intval(count($_SESSION["employes"]) / $nb_employe_page);
$nb_page_fin = 0;
if (count($_SESSION["employes"]) % $nb_employe_page != 0){
    $nb_page++;
    $nb_page_fin = count($_SESSION["employes"]) % $nb_employe_page;
}
//print($nb_page));
//print($nb_page_fin);


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
    input:active{
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
        if (!empty($_POST)){
            if ($_POST["page"] != $nb_page){
                for($i=1 ; $i<$nb_page ; $i++){
                        if ($_POST["page"] == $i){
                            $indice = $nb_employe_page * $i -$nb_employe_page;
                            for ($j=$indice ; $j<$indice+4 ; $j++){
                                $employe = $_SESSION["employes"][$j];
                                echo "<tr>
                                        <td>$employe[0]</td>
                                        <td>$employe[1]</td>
                                        <td>$employe[2]</td>
                                        <td>$employe[3]</td>
                                        <td>$employe[4]</td>
                                    </tr>";
                            } 
                        }
                }  
            }
            else{
                $indice = $nb_employe_page * $_POST["page"] -$nb_employe_page;
                for ($j=$indice ; $j<$indice+$nb_page_fin ; $j++){
                $employe = $_SESSION["employes"][$j];
                echo "<tr>
                        <td>$employe[0]</td>
                        <td>$employe[1]</td>
                        <td>$employe[2]</td>
                        <td>$employe[3]</td>
                        <td>$employe[4]</td>
                    </tr>";
                } 
            }
        }
    
        ?>


    </table>
    <?php

    echo "<form action='Affiche_SESSION.php' method='POST'>";
    for($i=1 ; $i<=$nb_page ; $i++){
        echo "<input type='submit' value='$i' name='page' /> ";
    }
    echo "<form>"


?>
    
</body>
</html>