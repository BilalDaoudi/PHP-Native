<?php


if (isset($_POST["btn"])) {
    $mat = $_POST["tMatricule"];
    $cnx = new PDO("mysql:host=localhost;dbname=GestionProjets", "root", "");
    $req = "select * from Employe where Matricule = ?";
    $st = $cnx->prepare($req);
    $st->bindParam(1,$mat);
    $st->execute();
    print_r($st->fetchAll()); 

}


?>

<form action="" method="post">
    <input type="text" name="tMatricule"><br><br>
    <input type="submit" value="Afficher" name="btn">
</form>