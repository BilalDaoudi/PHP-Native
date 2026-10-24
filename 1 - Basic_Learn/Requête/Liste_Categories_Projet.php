<?php

$table = "<table border='1' width='100%'>
<th> Code Catégorie </th>
<th> Libelle </th>";

$cx = new PDO("mysql:host=localhost;dbname=GestionProjets","root","");
$T_CatPro = $cx->query("select * from Categorieprojet")->fetchAll();
foreach($T_CatPro as $Cat){
    $table .= "<tr>";
    $table .= "<td> $Cat[0] </td>";
    $table .= "<td> $Cat[1] </td>";
    $table .= "</tr>";
}

$table .= "</table>";

echo $table;