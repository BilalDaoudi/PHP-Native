<?php
$slct1 = "<select name='tMatricule'>";
$cx = new PDO("mysql:host=localhost;dbname=GestionProjets","root","");
$T_matricules = $cx->query("select matricule from employe")->fetchAll();
foreach($T_matricules as $matricule){
    $slct1 .= "<option value='$matricule[0]'>$matricule[0]</option>";
}
$slct1 .= "</select>";


$slct2 = "<select name='tNumProjet'>";
$T_NumProjets = $cx->query("select numprojet from projet")->fetchAll();
foreach($T_NumProjets as $numpro){
    $slct2 .= "<option value='$numpro[0]'>$numpro[0]</option>";
}
$slct2 .= "</select>";


if (isset($_POST["btnAjouter"])){
    if (!empty($_POST["tMatricule"]) and !empty($_POST["tNumProjet"]) and !empty($_POST["tNBjours"]))
    {
        $mat = $_POST["tMatricule"];
        $NumProjet = $_POST["tNumProjet"];
        $nbj = $_POST["tNBjours"];
        
        $requete = "insert into Affectation values($mat,$NumProjet,$nbj)";
        try{
            $cnx = new PDO("mysql:host=localhost;dbname=GestionProjets","root","");
            try{
                $n = $cnx->exec($requete);
                if ($n == 1)
                    echo "<script> alert('Affectation est Ajouté avec Succés') </script>";
            }
            catch(Exception $ex){
                echo "<script> alert('Requête insert n\'est pas correct') </script>";
            }
        }
        catch(Exception $ex){
            echo "<script> alert('Erreur de connexion avec base donne ') </script>";
        }
    }
    else{
        echo "<script> alert('Tous les champs obligatoire') </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="Ajouter_Affictation.php" method="post">
        <pre>
            Matricule :         <?php echo $slct1; ?><br>
            Numéro de Projet :  <?php echo $slct2; ?><br>
            Nombre de jours :   <input type="text" name="tNBjours" id="tNBjours"><br>
                         <input type="submit" value="Ajouter" name="btnAjouter">
        </pre>
    </form>
</body>
</html>