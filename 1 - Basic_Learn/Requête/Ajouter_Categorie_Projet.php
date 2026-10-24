<?php
if (isset($_POST["btnAjouter"])){
    if (!empty($_POST["tCodeCategorie"]) and !empty($_POST["tLibelle"]) )
    {
        $codecat = $_POST["tCodeCategorie"];
        $libelle = $_POST["tLibelle"];
        
        
        $requete = "insert into categorieprojet values('$codecat','$libelle')";
        try{
            $cnx = new PDO("mysql:host=localhost;dbname=GestionProjets","root","");
            try{
                $n = $cnx->exec($requete);
                if ($n == 1)
                    echo "<script> alert('Categorie est Ajouté avec Succés') </script>";
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
    <form action="Ajouter_Categorie_Projet.php" method="post">
        <pre>
            Code Categorie :         <input type="text" name="tCodeCategorie" id="tCodeCategorie"><br>
            Libelle :                <input type="text" name="tLibelle" id="tLibelle"><br>
                            <input type="submit" value="Ajouter" name="btnAjouter">
        </pre>
    </form>
</body>
</html>