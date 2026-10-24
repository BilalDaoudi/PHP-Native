<?php
require "Connexion.php";

Connexion::ToConnecte();
$req = "select * from Filiere";
$Filieres = Connexion::$cnx->query($req)->fetchAll();

$slct = "<select name='tFiliere'>";
foreach ($Filieres as $F) {
    $slct .= "<option value='$F[1]'>$F[1]</option>";
}
$slct .= "</select>";



if (isset($_POST["btnModifier"])) {
    $id = $_GET["id"];

    $nom = $_POST["tNom"];
    $pr = $_POST["tPrenom"];
    $dt = $_POST["tDateNaissance"];
    $filiere = $_POST["tFiliere"];
    $req = "select * from Filiere where Intitule = '$filiere'";
    $Filieres = Connexion::$cnx->query($req)->fetch();
    $f = $Filieres[0];

    if (!empty($nom) and !empty($pr) and !empty($dt)) {
        $req = "Update Stagiaire set Nom = '$nom' ,Prenom = '$pr' ,DateNaissance = '$dt' ,
            IdFiliere = '$f' where IdStagiaire = $id";
        $n = Connexion::$cnx->exec($req);
        if ($n == 1) {
            echo "<script>alert('Stagiaire Est Modifié')</script>";
            header("location:espaceprivee.php");
        }
    }
}




?>





<html>

<head>
    <title>Authentification</title>
</head>

<body>
    <form enctype="multipart/form-data" action="" method="post">
        <h1>Modifier un Stagiaire</h1>
        <p>veuillez remplir tou les champs</p>
        Nom : <br>
        <input type="text" name="tNom"><br><br>
        Prénom : <br>
        <input type="text" name="tPrenom"><br><br>
        Date de Naissance : <br>
        <input type="date" name="tDateNaissance"><br><br>
        Filière : <br>
        <?php echo $slct  ?><br><br>
        <input type="submit" value="Modifier" name="btnModifier">
    </form>




</body>

</html>