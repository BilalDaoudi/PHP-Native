<?php
session_start();
require "../model/Client.php";

$client = new Client("candles", "localhost", "root", "");
$client->ToConnecte();

$req = "select now();";
$dt = $client->cnx->query($req)->fetch();


if (!isset($_SESSION["client"])) {
    header("location:../controller/Connecte_User.php");
}

if (count($_POST) == 1){
    header("location:../controller/User.php");
}

if (isset($_SESSION["client"])) {
    $T_Id = [];
    $T_Qt = [];
    for ($i = 0; $i < 1000; $i++) {
        $name = "name" . $i;
        $qt = "qt" . $i;
        if (isset($_POST[$name])) {
            $T_Id[] = $_POST[$name];
            $T_Qt[] = $_POST[$qt];
        }
    }

    $total = 0;
    $tr = "";
    for ($i = 0; $i < count($T_Id); $i++) {
        $Requete = "select * from Article where CodeArticle = $T_Id[$i]";
        $Article = $client->cnx->query($Requete)->fetch();
        $prix = $T_Qt[$i] * $Article[2];
        $total+=$prix;
        $tr.="<tr>
                <td>$Article[0]</td>
                <td colspan='2'>$Article[1]</td>
                <td>$Article[2]</td>
                <td>$T_Qt[$i]</td>
                <td>$prix</td>
                </tr>";
    }
    $totalttc = $total + $total * 0.1;
}
$_SESSION["idarticles"] = $T_Id;
$_SESSION["qtarticle"] = $T_Qt;

require "../view/Page_Commande.php";
