<?php


$table = "<table border='1' width='100%'>
<th> Matricule </th>
<th> Numéro Projet </th>
<th> Code Catégorie </th>";

$cx = new PDO("mysql:host=localhost;dbname=GestionProjets","root","");
$T_Affectations = $cx->query("select * from Affectation")->fetchAll();
foreach($T_Affectations as $Affec){
    $table .= "<tr>";
    $table .= "<td> $Affec[0] </td>";
    $table .= "<td> $Affec[1] </td>";
    $table .= "<td> $Affec[2] </td>";
    $table .= "</tr>";
}

$table .= "</table>";

echo $table;


?>