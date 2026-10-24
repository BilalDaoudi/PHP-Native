<?php
if (isset($_GET['info'])) {
    $info = $_GET['info'];
    $cnx = new PDO("mysql:host=localhost;dbname=gestionvols", "root", "12345678");
    if ($info == "") {
        $Pilotes = $cnx->query("select * from Pilote")->fetchAll(PDO::FETCH_NUM);
    } else {
        $Pilotes = $cnx->query("SELECT * FROM Pilote WHERE NumeroPilote REGEXP '$info'
        OR NomPilote REGEXP '$info'
        OR PrenomPilote REGEXP '$info'
        OR DateNaissance REGEXP '$info'
        OR Adresse REGEXP '$info'
        OR Telephone REGEXP '$info'
        OR Nationalite REGEXP '$info'
        OR DateRecrutement REGEXP '$info'")->fetchAll(PDO::FETCH_NUM);
    }




    echo "<br><br><table width='100%' >
            <tr>
                <th>Numero</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Date de Naissance</th>
                <th>Adresse</th>
                <th>Téléphone</th>
                <th>Nationalité</th>   
                <th>Date de Recrutement</th>            
            </tr>
    ";
    foreach ($Pilotes as $pil) {
        echo "<tr>
                    <td>$pil[0]</td>
                    <td>$pil[1]</td>
                    <td>$pil[2]</td>
                    <td>$pil[3]</td>
                    <td>$pil[4]</td>
                    <td>$pil[5]</td>
                    <td>$pil[6]</td> 
                    <td>$pil[7]</td>              
            </tr>";
    }
    echo "</table>";
}
