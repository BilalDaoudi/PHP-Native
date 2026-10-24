<?php

$slct = "<select name='tCodeCategorie'>";
$cx = new PDO("mysql:host=localhost;dbname=GestionProjets","root","");
$T_CoodeCate = $cx->query("select codecategorie from categorieprojet")->fetchAll();
foreach($T_CoodeCate as $codecat){
    $slct .= "<option value='$codecat[0]'>$codecat[0]</option>";
}
$slct .= "</select>";




if (isset($_POST["btnModifier"])){
    if (!empty($_POST["tNumProjet"]) and !empty($_POST["tDesignation"]) and !empty($_POST["tCodeCategorie"]) and !empty($_POST["tDateDebut"]) and !empty($_POST["tDateFin"]))
    {
        $nump = $_POST["tNumProjet"];
        $des = $_POST["tDesignation"];
        $codecat = $_POST["tCodeCategorie"];
        $dd = $_POST["tDateDebut"];
        $df = $_POST["tDateFin"];
        
        $requete = "update projet set designation = '$des', CodeCategorie = '$codecat', DateDebut = '$dd', DateFint = '$df' where NumProjet = $nump";
        try{
            $cnx = new PDO("mysql:host=localhost;dbname=GestionProjets","root","");
            try{
                $n = $cnx->exec($requete);
                if ($n == 1)
                    echo "<script> alert('Projet est Modifié avec Succés') </script>";
                else
                    echo "<script> alert('Projet n\'est pas Existe') </script>";
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
    <form action="Modifier_Projet.php" method="post">
        <pre>
            Numéro de Projet : <input type="text" name="tNumProjet" id="tNumProjet"><br>
            Designation :      <input type="text" name="tDesignation" id="tDesignation"><br>
            Code Categorie :   <?php echo $slct; ?><br>
            Date Debut :       <input type="date" name="tDateDebut" id="tDateDebut"><br>
            Date Fin :         <input type="date" name="tDateFin" id="tDateFin"><br><br>
                        <input type="submit" value="Modifier" name="btnModifier">
        </pre>
    </form>
</body>
</html>