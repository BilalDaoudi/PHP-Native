<?php
$cnx = new mysqli("localhost","root","","GestionProjets");

// Afficher ===================================================================================================
/*
$T_Categorie = $cnx->query("select CodeCategorie from CategorieProjet")->fetch_all();
foreach($T_Categorie as $Cat){
    $T_projets = $cnx->query("select * from Projet where CodeCategorie = '$Cat[0]'")->fetch_all();
    echo "Les Projets de Categorie $Cat[0] :";
    echo "<table border='1' width='100%'>
            <tr>
                <th>Numéro de Projet</th>
                <th>Description</th>
                <th>Code Categorie</th>
                <th>Date Debut</th>
                <th>Date Fin</th>
            </tr>";
    foreach($T_projets as $projet){
        echo "<tr>
                <td>$projet[0] </td>
                <td>$projet[1] </td>
                <td>$projet[2] </td>
                <td>$projet[3] </td>
                <td>$projet[4] </td>
            </tr>";
    }
    echo "</table>";
    echo "<br><br>";
}
*/

//  Requete Prepare ==========================================================================================
$T_Categorie = $cnx->query("select CodeCategorie from CategorieProjet")->fetch_all();
$req_pre = "select * from projet where CodeCategorie =?";
$st = $cnx->prepare($req_pre);
foreach($T_Categorie as $Cat){

    $st->bind_param("s",$Cat[0]);
    $st->execute();
    $T_projets = $st->get_result()->fetch_all();

    echo "Les Projets de Categorie $Cat[0] :";
    echo "<table border='1' width='100%'>
            <tr>
                <th>Numéro de Projet</th>
                <th>Description</th>
                <th>Code Categorie</th>
                <th>Date Debut</th>
                <th>Date Fin</th>
            </tr>";
    foreach($T_projets as $projet){
        echo "<tr>
                <td>$projet[0] </td>
                <td>$projet[1] </td>
                <td>$projet[2] </td>
                <td>$projet[3] </td>
                <td>$projet[4] </td>
            </tr>";
    }
    echo "</table>";
    echo "<br><br>";
}











?>