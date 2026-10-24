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



if (isset($_POST["btnAjouter"])) {

    $nom = $_POST["tNom"];
    $pr = $_POST["tPrenom"];
    $dt = $_POST["tDateNaissance"];
    $filiere = $_POST["tFiliere"];
    $req = "select * from Filiere where Intitule = '$filiere'";
    $Filieres = Connexion::$cnx->query($req)->fetch();
    $f = $Filieres[0];

    if (!empty($nom) and !empty($pr) and !empty($dt) and isset($_FILES["tPhoto"])) {
        $type = $_FILES['tPhoto']["type"];
        $ext = "";
        if ($type == "image/jpeg") {
            $ext = ".jpeg";
        }
        if ($type == "image/png") {
            $ext = ".png";
        }
        if ($ext != "") {
            $ph = "Photo/" . $_FILES['tPhoto']["name"];
            $req = "insert INTO Stagiaire(Nom,Prenom,DateNaissance,PhotoProfil,IdFiliere) VALUES
            ('$nom','$pr','$dt','$ph','$f')";
            $n = Connexion::$cnx->exec($req);
            if ($n == 1) {
                move_uploaded_file($_FILES['tPhoto']['tmp_name'], $ph);
                echo "<script>alert('Stagiaire Est Ajouté')</script>";
                header("location:espaceprivee.php");
            }
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
        <h1>Ajouter un Stagiaire</h1>
        <p>veuillez remplir tou les champs</p>
        Nom : <br>
        <input type="text" name="tNom"><br><br>
        Prénom : <br>
        <input type="text" name="tPrenom"><br><br>
        Date de Naissance : <br>
        <input type="date" name="tDateNaissance"><br><br>
        Photo Profil : <br>
        <input type="file" name="tPhoto"><br><br>
        Filière : <br>
        <?php echo $slct  ?><br><br>
        <input type="submit" value="Ajouter" name="btnAjouter">
    </form>




</body>

</html>