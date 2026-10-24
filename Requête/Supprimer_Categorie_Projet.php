<?php
if (isset($_POST["btnSupprimer"])){
    if (!empty($_POST["tCodeCategorie"]))
    {
        $codecat = $_POST["tCodeCategorie"];
        $requete = "delete from categorieprojet where codecategorie = '$codecat'";
        try{
            $cnx = new PDO("mysql:host=localhost;dbname=GestionProjets","root","");
            try{
                $n = $cnx->exec($requete);
                if ($n == 1)
                    echo "<script> alert('Categorie est Supprimé avec Succés') </script>";
                else
                    echo "<script> alert('Categorie n\'est pas Existe') </script>";
            }
            catch(Exception $ex){
                echo "<script> alert('Categorie déjà existe') </script>";
            }
        }
        catch(Exception $ex){
            echo "<script> alert('Erreur de connexion avec base donne ') </script>";
        }
    }
    else{
        echo "<script> alert('Code Categorie est obligatoire') </script>";
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
    <form action="Supprimer_Categorie_Projet.php" method="post">
        <pre>
            Code Categorie :         <input type="text" name="tCodeCategorie" id="tCodeCategorie"><br>
                            <input type="submit" value="Supprimer" name="btnSupprimer">
        </pre>
    </form>
</body>
</html>