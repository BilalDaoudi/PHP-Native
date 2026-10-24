<?php
$slct = "<select name='tMatricule' onchange='document.forms[0].submit();'> 
<option value='Choisir'>Choisir</option>";
$cx = new PDO("mysql:host=localhost;dbname=GestionProjets","root","");
$T_matricules = $cx->query("select matricule from employe")->fetchAll();
foreach($T_matricules as $matricule){
    $slct .= "<option value='$matricule[0]'>$matricule[0]</option>";
}
$slct .= "</select>";


$table = "";
$table1 = "";
if (!empty($_POST)){
    if (isset($_POST["tMatricule"])){
        $mat = $_POST["tMatricule"];
        $Employe = $cx->query("select * from Employe where matricule = $mat")->fetch();
        $table .= "<table border='1' width='50%'>
                        <tr>
                            <th> Matricule </th>
                            <th> Nom </th>
                            <th> Prénom </th>
                            <th> Date de Naissance </th>
                            <th> Salaire </th>
                        </tr>
                        <tr>
                            <td> $Employe[0] </td>
                            <td> $Employe[1] </td>
                            <td> $Employe[2] </td>
                            <td> $Employe[3] </td>
                            <td> $Employe[4] </td>
                        </tr>
                    </table>
                   ";
        $table1 = "<table border='1' width='50%'>
                    <th> Matricule </th>
                    <th> Numéro Projet </th>
                    <th> Code Catégorie </th>";
        $T_Affectations = $cx->query("select * from Affectation where matricule = $mat")->fetchAll();
        foreach($T_Affectations as $Affec){
            $table1 .= "<tr>";
            $table1 .= "<td> $Affec[0] </td>";
            $table1 .= "<td> $Affec[1] </td>";
            $table1 .= "<td> $Affec[2] </td>";
            $table1 .= "</tr>";
        }

        $table1 .= "</table>";
    }

}


// Pour Afficher Tous Les Employes

/*
$table = "<table border='1' width='50%'>
<th> Matricule </th>
<th> Nom </th>
<th> Prénom </th>
<th> Date de Naissance </th>
<th> Salaire </th>";

$cx = new PDO("mysql:host=localhost;dbname=GestionProjets","root","");
$T_Employes = $cx->query("select * from Employe")->fetchAll();
foreach($T_Employes as $Employe){
    $table .= "<tr>";
    $table .= "<td> $Employe[0] </td>";
    $table .= "<td> $Employe[1] </td>";
    $table .= "<td> $Employe[2] </td>";
    $table .= "<td> $Employe[3] </td>";
    $table .= "<td> $Employe[4] </td>";
    $table .= "</tr>";
}

$table .= "</table>";

echo $table;
*/

?>
<html>
    <head>
        <title>Recherche Employe</title>
    </head>
    <body>
        <form action="Rechercher_Employe_onchange.php" method="post">
        Matricule : <?php echo $slct ?>
        </form>
        <?php 
        if (!empty($_POST)){
            echo "<h4>Les Information :</h4>";
            echo $table;
            echo "<h4>Les Affectations :</h4>";
            echo $table1;
        }
         ?>
    </body>
</html>
