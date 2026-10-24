<?php
require "../model/Client.php";

$client = new Client("candles", "localhost", "root", "");
$client->ToConnecte();




session_start();


if (isset($_POST["btnRetour"])) {
    header("location:../controller/User.php");
}

if (!isset($_SESSION["client"])) {
    header("location:../controller/Connecte_User.php");
}

if (isset($_POST["btnAcheter"])) {
    if (!empty($_POST["adresse"]) and !empty($_POST["NumCarte"]) and !empty($_POST["mm"]) and !empty($_POST["yy"]) and !empty($_POST["password"])) {
        $T_Id = $_SESSION["idarticles"];
        $T_Qt = $_SESSION["qtarticle"];
        $idclient = $_SESSION["client"][0];
        $n = $client->cnx->exec("insert into facture(IdClient,DateFacture) values ($idclient,now()) ");
        $factures = $client->cnx->query("select * from facture")->fetchAll();
        $nbfacture = count($factures);
        $numfac = $factures[$nbfacture - 1][0];
        for ($i = 0; $i < count($T_Id); $i++) {
            $CodeArticle = $T_Id[$i];
            $qt = $T_Qt[$i];
            $m = $client->cnx->exec("insert into lingefacture values ($numfac,$CodeArticle,$qt) ");
        }
        if ($n){
            echo "<script>alert('Facture est Ajouté Avec Sucées')</script>";
            header("location:../controller/User.php");
        }
    }else{
        echo "<script>alert('Remplir les Information de carte')</script>";
    }
}





require "../view/Page_Paiement.php";
