<?php
if (isset($_POST["btnAjouter"])){
    if (!empty($_POST["tMatricule"]) and !empty($_POST["tNom"]) and !empty($_POST["tPrenom"]) and !empty($_POST["tDateNaissance"]) and !empty($_POST["tSalaire"]))
    {
        $mat = $_POST["tMatricule"];
        $nom = $_POST["tNom"];
        $pr = $_POST["tPrenom"];
        $dt = $_POST["tDateNaissance"];
        $sal = $_POST["tSalaire"];
        
        $requete = "insert into employe values($mat,'$nom','$pr','$dt',$sal)";
        try{
            $cnx = new PDO("mysql:host=localhost;dbname=GestionProjets","root","");
            try{
                $n = $cnx->exec($requete);
                if ($n == 1)
                    echo "<script> alert('Employe est Ajouté avec Succés') </script>";
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
    <form action="Ajouter_Employe.php" method="post">
        <pre>
            Matricule :         <input type="text" name="tMatricule" id="tMatricule"><br>
            Nom :               <input type="text" name="tNom" id="tNom"><br>
            Prénom :            <input type="text" name="tPrenom" id="tPrenom"><br>
            Date de naissance : <input type="date" name="tDateNaissance" id="tDateNaissance"><br>
            Salaire :           <input type="text" name="tSalaire" id="tSalaire"><br><br>
                            <input type="submit" value="Ajouter" name="btnAjouter">
        </pre>
    </form>
</body>
</html>