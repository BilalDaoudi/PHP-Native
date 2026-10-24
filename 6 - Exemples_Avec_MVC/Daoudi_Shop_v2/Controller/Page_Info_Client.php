<?php
require "../Model/ConnexionDB.php";
session_start();

if (isset($_SESSION["Articles"]) and count($_SESSION["Articles"])) {

    if (isset($_POST["btnValider"])) {
        $nom = $_POST["tNom"];
        $email = $_POST["tEmail"];
        $adresse = $_POST["tAdresse"];
        $tele = $_POST["tTele"];
        $dt = date("Y-m-d H:i:s");
        if (!empty($nom) && !empty($email) && !empty($adresse) && !empty($tele)) {
            ConnexionDB::Toconnecte();
            $query = "insert into Facture(NomClient,EmailClient,TelephoneClient,AdresseClient,DateFacture)
            values('$nom','$email','$tele','$adresse','$dt')";
            $n = ConnexionDB::$cnx->exec($query);
            if ($n) {
                $IdFacture = ConnexionDB::$cnx->query("select * from Facture 
                where NomClient='$nom' and EmailClient='$email' and TelephoneClient='$tele' 
                and AdresseClient='$adresse' and DateFacture='$dt'")->fetch();

                foreach ($_SESSION['Articles'] as $art) {
                    $requete = "insert into LingneFacture values('$art[0]',$IdFacture[0],$art[1])";
                    ConnexionDB::$cnx->exec($requete);
                }
                echo "<script> alert('Ton Facture est Ajouté Avec Succées') </script>";


                
                $to = 'bilaldaoudi591@gmail.com';
                $subject = "Commande";
                $message = "Bonjour, Il y a Une Commende de ".$nom." ,Numéro de Facture est ".$IdFacture[0];
                // $from = "daoudibilal71@gmail.com";
                // $headers = "MIME-Version:"."\r\n";
                // $headers .= "content-type: texthtml; charset-iso-8859-1"."\r\n";

                // $headers .= "From:". $from . "X-Mailler : PHP/" . phpversion();
                if(mail($to,$subject,$message)){
                    echo "<script> alert('Message a été envoyer') </script>";
                }
                else{
                    echo "<script> alert('Message n'a pas été envoyer') </script>";
                }

                session_unset();
                session_destroy();
            } else {
                echo "<script> alert('Erreurs') </script>";
            }
        }
    }
} else {
    header("location:../Controller/Page_Categorie.php");
}



require "../View/Page_Info_Client.php";
