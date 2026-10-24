<?php
$cnx = new PDO("mysql:host=localhost;dbname=GestionProjets","root","");
$table = "";
if (isset($_POST["btnAffiche"])){
    $nom = $_POST['tNom'];

    /*
    $requete = "select * from Employe where Nom = '$nom'";
    $rows = $cnx->query($requete)->fetchAll();
    
*/

    
    
    $req_prep = "select * from Employe where Nom = ?";
    $rows = $cnx->prepare($req_prep);
    $rows->bindParam(1,$nom);
    $rows->execute();
    

    foreach($rows as $row){
        $table .= "<tr>
                        <td>$row[0]</td>
                        <td>$row[1]</td>
                        <td>$row[2]</td>
                        <td>$row[3]</td>

                        <td>$row[4]</td>
                    </tr>";
    }
}

?>
<html>
<head>
    <title>Attention</title>
</head>

<body>
    

<h1>Hello :</h1>
<br>
<form method="post">
    Nom Employe : <input type="text" name="tNom" id="tNom"><br><br><br>

    <input type="submit" value="Affiche" name="btnAffiche">

</form>
<br><br><br>

<table border="1" width="100%">
    <tr>
        <th>Matricule</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Date de Naisssance</th>
        <th>Salaire</th>
    </tr>

    <?php  echo $table ?>

</table>
</body>

</html>