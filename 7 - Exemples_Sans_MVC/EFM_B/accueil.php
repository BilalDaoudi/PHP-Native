<?php
require "Produit.php";
session_start();


if (isset($_POST["btnQuiter"])){
    session_unset();
    session_destroy();
}

if (isset($_GET["reference"])){
    $ref = $_GET["reference"];

}


if (isset($_SESSION["user"])) {
    $nom = $_SESSION["user"][2];
    $prenom = $_SESSION["user"][3];

    $h = date("H");
    if ($h > 6 and $h < 19){
        $mess = "Bonjour";
    }else{
        $mess = "Bonsoir";
    }
    
    $produit = new Produit();

    $rows = $produit->getAll();
    if ($rows){
        $table = "<table border='1' width='100%'>
        <tr>
                    <th>Reference</th>
                    <th>Libelle</th>
                    <th>Prix Unitaire</th>
                    <th>Date Achat</th>
                    <th>Photo</th>
                    <th>Categorie</th>
                    <th>Action</th>

                </tr>
                ";
        foreach($rows as $row){
            $mes = "return confirm('Sure ?')";
            $table .= '<tr>
                        <td>'.$row[0].'</td>
                        <td>'.$row[1].'</td>
                        <td>'.$row[2].'</td>
                        <td>'.$row[3].'</td>
                        <td><img src="'.$row[4].'" width="100px"></td>
                        <td>'.$row[5].'</td>
                        <td><a href="?reference='.$row[0].'"><button onclick = "'.$mes.'">Supprimer</button></a>
                        <a href="Modifier.php?reference='.$row[0].'"><button>Modifier</button></a></td>
                        </tr>';
        }
        $table.="</table>";
    }

}
else{
    header("location:Authentification.php");
}





?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exp Reguliere</title>
</head>

<body>
    <form action="" method="post">
        <ul>
            <li>Application Produits</li>
            <li>Accueil</li>
            <li>
                <a href="AjouterProduit.php">Ajouter</a>
            </li>
            <li>
                <input type="submit" value="Quiter Session" name="btnQuiter">
            </li>
        </ul>

        <p><?php echo $mess .' '. $nom . " " . $prenom; ?></p>

       


    </form>
    
    <?php echo $table; ?>
</body>

</html>