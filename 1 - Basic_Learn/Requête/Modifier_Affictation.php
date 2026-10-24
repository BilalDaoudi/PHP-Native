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



if (isset($_POST["btnModifier"])){
    if (!empty($_POST["tMatricule"]) and !empty($_POST["tNumProjet"]) and !empty($_POST["tNBjours"]))
    {
        $mat = $_POST["tMatricule"];
        $NumProjet = $_POST["tNumProjet"];
        $nbj = $_POST["tNBjours"];
        
        $requete = "update Affectation set Nbjours = $nbj where Matricule = $mat and NumProjet = $NumProjet";
        try{
            $cnx = new PDO("mysql:host=localhost;dbname=GestionProjets","root","");
            try{
                $n = $cnx->exec($requete);
                if ($n == 1)
                    echo "<script> alert('Affectation est Modifié avec Succés') </script>";
                else
                    echo "<script> alert('Affectation n\'est pas existe ') </script>";

            }
            catch(Exception $ex){
                echo "<script> alert('Requête Update n\'est pas correct') </script>";
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
    <form action="Modifier_Affictation.php" method="post">
        <pre>
            Matricule :         <?php echo $slct1; ?><br>
            Numéro de Projet :  <?php echo $slct2; ?><br>
            Nombre de jours :   <input type="text" name="tNBjours" id="tNBjours"><br>
                         <input type="submit" value="Modifier" name="btnModifier">
        </pre>
    </form>
</body>
</html>