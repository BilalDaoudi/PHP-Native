<?php
if (isset($_POST["btnSupprimer"])){
    if (!empty($_POST["tMatricule"])){
        $mat = $_POST["tMatricule"];
        $requete = "delete from employe where matricule = $mat";
        try{
            $cnx = new PDO("mysql:host=localhost;dbname=GestionProjets","root","");
            try{
                $n = $cnx->exec($requete);
                if ($n == 1)
                    echo "<script> alert('Employe est Supprimé avec Succés') </script>";
                else
                    echo "<script> alert('Employe n\'est pas Existe') </script>";
            }
            catch(Exception $ex){
                echo '<script> alert("Matricule est un entier") </script>';
            }
        }
        catch(Exception $ex){
            echo "<script> alert('Erreur de connexion avec base donne ') </script>";
        }
    }
    else{
        echo "<script> alert('Matricule Obligatoire') </script>";
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
    <form action="Supprimer_Employe.php" method="post">
        <pre>
            Matricule :         <input type="text" name="tMatricule" id="tMatricule"><br>
                            <input type="submit" value="Supprimer" name="btnSupprimer">
        </pre>
    </form>
</body>
</html>