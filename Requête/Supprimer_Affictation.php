<?php
if (isset($_POST["btnSupprimer"])){
    if (!empty($_POST["tMatricule"]) and !empty($_POST["tNumProjet"]))
    {
        $mat = $_POST["tMatricule"];
        $NumProjet = $_POST["tNumProjet"];
        
        $requete = "delete from Affectation where Matricule = $mat and NumProjet = $NumProjet";
        try{
            $cnx = new PDO("mysql:host=localhost;dbname=GestionProjets","root","");
            try{
                $n = $cnx->exec($requete);
                if ($n == 1)
                    echo "<script> alert('Affectation est Supprimé avec Succés') </script>";
                else
                    echo "<script> alert('Affectation n\'est pas existe ') </script>";

            }
            catch(Exception $ex){
                echo "<script> alert('Requête Delete n\'est pas correct') </script>";
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
    <form action="Supprimer_Affictation.php" method="post">
        <pre>
            Matricule :         <input type="text" name="tMatricule" id="tMatricule"><br>
            Numéro de Projet :  <input type="text" name="tNumProjet" id="tNumProjet"><br>
                         <input type="submit" value="Supprimer" name="btnSupprimer">
        </pre>
    </form>
</body>
</html>