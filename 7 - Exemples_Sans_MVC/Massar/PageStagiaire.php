<?php
require "ConnexionDB.php";
session_start();


if (isset($_POST["btnDeconnexion"])){
    $_SESSION["Ni"] = 0;
}

if (isset($_SESSION["Ni"]) && $_SESSION["Ni"] != 0){
    $ni = $_SESSION["Ni"];
    Connexion::Connecte();
    $_SESSION["stagiaire"] = Connexion::$cnx->query("select * from Stagiaire where NumInscription =$ni")->fetchAll();
    $_SESSION["moy"] = Connexion::$cnx->query("select sum(mo.Coefficient*ev.NoteEvaluation) as 'som', sum(mo.Coefficient)
                                                from Evaluation ev inner join Module mo on mo.NumModule = ev.NumModule
                                                where NumInscription =$ni")->fetch();

    Connexion::Deconnecte();
    $stg =  $_SESSION["stagiaire"][0];
    
    echo "BienVenu <br>";
    echo "Numéro Inscription : $stg[0]<br>";
    echo "Nom : $stg[1]<br>";
    echo "Prénom : $stg[2]<br>";
    echo "Date de naissance : $stg[3]<br>";
    echo "Téléphone : $stg[4]<br> <br>";

    $moy = $_SESSION['moy'][0] / $_SESSION['moy'][1];
    echo "Votre Moyenne Générale est : $moy<br> ";

    echo "<a href='PageStagiaire.php?Ni=$ni&details=true'> Voire Détails</a> ";
    echo "<br> <br>";

    if (isset($_GET['details'])){
         echo "Listes des Evaluations <br><br>";
         echo "<table border='1' width='100%'>
         <tr>
             <th>Numéro Inscription</th>
             <th>Numéro Module</th>
             <th>Date Evaluation</th>
             <th>Note Evaluation</th>
             <th>Salle</th>
             <th>Matricule de Formateur</th>
             <th>Titre</th>
             <th>Coefficient</th>
             
         </tr>";
     
         Connexion::Connecte();
         $rows = Connexion::$cnx->query("select ev.*,mo.Salle,mo.MatriculeFormateur,mo.Titre,mo.Coefficient from evaluation ev inner join Module mo on mo.NumModule=ev.NumModule where ev.NumInscription =$ni")->fetchAll();
        Connexion::Deconnecte();

        
        foreach($rows as $row){
            echo "<tr>
                         <td>$row[0]</td>
                         <td>$row[1]</td>
                         <td>$row[2]</td>
                         <td>$row[3]</td>
                         <td>$row[4]</td>
                         <td>$row[5]</td>
                         <td>$row[6]</td>
                         <td>$row[7]</td>
             
                     </tr>";

        }
        echo "</table>";

    }


}
else{
    header("location:Home.php");
}


?>

<form action="PageStagiaire.php" method="post">
    <input type="submit" value="Deconnexion" name="btnDeconnexion">
</form>
