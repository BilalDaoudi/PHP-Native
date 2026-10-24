<?php
$slct = "<select name='tNumProjet'> 
<option value='Choisir'>Choisir</option>";
$cx = new PDO("mysql:host=localhost;dbname=GestionProjets","root","");
$T_Projets = $cx->query("select numprojet from projet")->fetchAll();
foreach($T_Projets as $projet){
    $slct .= "<option value='$projet[0]'>$projet[0]</option>";
}
$slct .= "</select>";


$table = "";
$table1 = "";
if (isset($_POST["recherche"])){
    if ($_POST["tNumProjet"] != "Choisir"){
        $NumProjet = $_POST["tNumProjet"];
        $Projet = $cx->query("select * from projet where NumProjet = $NumProjet")->fetch();
        $table .= "<table border='1' width='50%'>
                        <tr>
                            <th> Numéro de Projets </th>
                            <th> Désignation </th>
                            <th> Code Catégorie </th>
                            <th> Date Debut </th>
                            <th> Date Fin </th>
                        </tr>
                        <tr>
                            <td> $Projet[0] </td>
                            <td> $Projet[1] </td>
                            <td> $Projet[2] </td>
                            <td> $Projet[3] </td>
                            <td> $Projet[4] </td>
                        </tr>
                    </table>
                   ";
        $table1 = "<table border='1' width='50%'>
                    <th> Matricule </th>
                    <th> Numéro Projet </th>
                    <th> Code Catégorie </th>";
        $T_Affectations = $cx->query("select * from Affectation where NumProjet = $NumProjet")->fetchAll();
        foreach($T_Affectations as $Affec){
            $table1 .= "<tr>";
            $table1 .= "<td> $Affec[0] </td>";
            $table1 .= "<td> $Affec[1] </td>";
            $table1 .= "<td> $Affec[2] </td>";
            $table1 .= "</tr>";
        }

        $table1 .= "</table>";
    }
    else
        echo "<script>alert('Choisir Numéro De Projet !!!!')</script>";
}

?>
<html>
    <head>
        <title>Recherche Employe</title>
    </head>
    <body>
        <form action="Rechercher_Projet.php" method="post">
        Numéro De Projet : <?php echo $slct ?>
        <input type="submit" value="Rechercher" name="recherche">
        </form>
        <?php 
        if (isset($_POST["recherche"])){
            if ($table != "" and $table1 != ""){
                echo "<h4>Les Information :</h4>";
                echo $table;
                echo "<h4>Les Affectations :</h4>";
                echo $table1;
        }
        }
         ?>
    </body>
</html>




<?php
// Pour Afficher Tous Les Projets

/*$table = "<table border='1' width='100%'>
<th> Numéro Projet </th>
<th> Désignation </th>
<th> Code Catégorie </th>
<th> Date Debut </th>
<th> Date Fin </th>";

$cx = new PDO("mysql:host=localhost;dbname=GestionProjets","root","");
$T_Projets = $cx->query("select * from projet")->fetchAll();
foreach($T_Projets as $pro){
    $table .= "<tr>";
    $table .= "<td> $pro[0] </td>";
    $table .= "<td> $pro[1] </td>";
    $table .= "<td> $pro[2] </td>";
    $table .= "<td> $pro[3] </td>";
    $table .= "<td> $pro[4] </td>";
    $table .= "</tr>";
}

$table .= "</table>";

echo $table;*/


?>