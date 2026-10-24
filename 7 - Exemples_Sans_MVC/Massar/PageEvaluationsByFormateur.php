<?php
require "ConnexionDB.php";
session_start();

if (isset($_POST["btnDeconnexion"])){
    $_SESSION["Matricule"] = 0;
}

if (isset($_SESSION["Matricule"]) && $_SESSION["Matricule"] != 0){
    $mat = $_SESSION["Matricule"];
    Connexion::Connecte();
    $_SESSION["modules"] = Connexion::$cnx->query("select Titre from module where MatriculeFormateur = $mat")->fetchAll();
    Connexion::Deconnecte();
    echo "<form action='PageEvaluationsByFormateur.php?Matricule=$mat' method='post'>";
    echo "<select name='tmodule' onchange='this.form.submit()'><option value='choisir'>Choisir Module</option>";
    foreach($_SESSION["modules"] as $module){
        echo "<option value='$module[0]'>$module[0]</option>";
    }
    echo "</select>";
    echo "</form>";



    if (!empty($_POST)){
        $mod = $_POST['tmodule'];
        Connexion::Connecte();
        $rows = Connexion::$cnx->query("select st.NumInscription,st.Nom,st.prenom,mo.Titre,mo.Coefficient,ev.NoteEvaluation,ev.DateEvaluation 
                                                            from Stagiaire st inner join Evaluation ev on ev.NumInscription = st.NumInscription
                                                            inner join Module mo on ev.NumModule = mo.NumModule
                                                            where mo.Titre = '$mod'")->fetchAll();
        Connexion::Deconnecte();

         echo "Listes des Evaluations <br><br>";
         echo "<table border='1' width='100%'>
         <tr>
             <th>Numéro Inscription</th>
             <th>Nom</th>
             <th>Prénom</th>
             <th>Titre</th>
             <th>Coefficient</th>
             <th>Note Evaluation</th>
             <th>Date Evaluation</th>
         </tr>";
        
         foreach($rows as $row){
            echo "<tr>
                         <td>$row[0]</td>
                         <td>$row[1]</td>
                         <td>$row[2]</td>
                         <td>$row[3]</td>
                         <td>$row[4]</td>
                         <td>$row[5]</td>
                         <td>$row[6]</td>
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