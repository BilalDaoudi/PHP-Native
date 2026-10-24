<?php
if (isset($_POST["btnSupprimer"])){
    if (!empty($_POST["tNumProjet"])){
        $nump = $_POST["tNumProjet"];
        $requete = "delete from Projet where NumProjet = $nump";
        try{
            $cnx = new PDO("mysql:host=localhost;dbname=GestionProjets","root","");
            try{
                $n = $cnx->exec($requete);
                if ($n == 1)
                    echo "<script> alert('Projet est Supprimé avec Succés') </script>";
                else
                    echo "<script> alert('Projet n\'est pas Existe') </script>";
            }
            catch(Exception $ex){
                echo '<script> alert("Numéro de Projet est un entier") </script>';
            }
        }
        catch(Exception $ex){
            echo "<script> alert('Erreur de connexion avec base donne ') </script>";
        }
    }
    else{
        echo "<script> alert('Numéro de Projet Obligatoire') </script>";
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
    <form action="Supprimer_Projet.php" method="post">
        <pre>
            Numéro de Projet :         <input type="text" name="tNumProjet" id="tNumProjet"><br>
                            <input type="submit" value="Supprimer" name="btnSupprimer">
        </pre>
    </form>
</body>
</html>