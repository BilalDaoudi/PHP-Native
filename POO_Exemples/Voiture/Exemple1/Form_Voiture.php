<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voiteur</title>
</head>
<body>
    <?php
    include "Class_Voiture.php";
    // print_r($_POST);
    $nbchassis = "";
    $marque = "";

    $mercedes = "";
    $peugaot = "";
    $reunault = "";
    $audi = "";

    $model = "";
    $prix = "";
    $couleur = "";
    $selected1 = "selected";
    $selected2 = "";
    $selected3 = "";
    $selected4 = "";
    $selected5 = "";

    $airbag = "";
    $climatisation = "";
    $freins = "";

    $ckd1 = "";
    $ckd2 = "";
    $ckd3 = "";



    $erreur = "";
    

    if (isset($_POST["btn"])){
        if(!empty($_POST["numchassis"]))
            $nbchassis = $_POST["numchassis"];
        else
            $erreur .= "Saisir le numéro de Chassis <br>";
        
        $marque = $_POST["marque"];
        if($marque == "Mercedes"){
            $mercedes = "checked";
            $peugaot = "";
            $reunault = "";
            $audi = "";
        }
        if($marque == "Peugaot"){
            $mercedes = "";
            $peugaot = "checked";
            $reunault = "";
            $audi = "";
        }
        if($marque == "Renault"){
            $mercedes = "";
            $peugaot = "";
            $reunault = "checked";
            $audi = "";
        }
        if($marque == "Audi"){
            $mercedes = "";
            $peugaot = "";
            $reunault = "";
            $audi = "checked";
        }
        if(!empty($_POST["model"]))
            $model = $_POST["model"];
        else
            $erreur .= "Saisir le Model <br>";

        if(!empty($_POST["prix"]))
            $prix =(float)$_POST["prix"];
        else
            $erreur .= "Saisir le Prix <br>";

        $couleur = $_POST["couleur"];
        if($couleur == "Noir"){
            $selected1 = "selected";
            $selected2 = "";
            $selected3 = "";
            $selected4 = "";
            $selected5 = "";
        }
        if($couleur == "Bleu"){
            $selected1 = "";
            $selected2 = "selected";
            $selected3 = "";
            $selected4 = "";
            $selected5 = "";
        }
        if($couleur == "Gris"){
            $selected1 = "";
            $selected2 = "";
            $selected3 = "selected";
            $selected4 = "";
            $selected5 = "";
        }
        if($couleur == "Vers"){
            $selected1 = "";
            $selected2 = "";
            $selected3 = "";
            $selected4 = "selected";
            $selected5 = "";
        }
        if($couleur == "Jeune"){
            $selected1 = "";
            $selected2 = "";
            $selected3 = "";
            $selected4 = "";
            $selected5 = "selected";
        }

        if (isset($_POST["Airbag"])){
            $airbag = $_POST["Airbag"];
            $ckd1 = "checked";
        }
        if (isset($_POST["Climatisation"])){
            $climatisation = $_POST["Climatisation"];
            $ckd2 = "checked";
        }
        if (isset($_POST["FreinsAbs"])){
            $freins = $_POST["FreinsAbs"];
            $ckd3 = "checked";
        }
        
        $V1 = new Voiture();
        $V1->SetNumeroChassis($nbchassis);
        $V1->SetMarque($marque);
        $V1->SetModel($model);
        $V1->SetPrix($prix);
        $V1->SetCouleur($couleur);
        if ($ckd1 != ""){
            $V1->AddOption($airbag);
        }
        if ($ckd2 != ""){
            $V1->AddOption($climatisation);
        }
        if ($ckd3 != ""){
            $V1->AddOption($freins);
        }
        Voiture::$ListeVoiture[$nbchassis] = $V1;
    }





?>
    <form action="Form_Voiture.php" method="post">

        <label for="numchassis">Numéro Chassis  : </label>
        <input type="text" name="numchassis" id="numchassis" value="<?php echo $nbchassis ?>">

        <br><br>

        <label for="marque">Marque : </label>
        <input type="radio" name="marque" id="marque" value="Mercedes" <?php echo $mercedes ?>>Mercedes &nbsp;&nbsp;&nbsp;
        <input type="radio" name="marque" id="marque" value="Peugaot" <?php echo $peugaot ?>>Peugaot &nbsp;&nbsp;&nbsp;
        <input type="radio" name="marque" id="marque" value="Renault" <?php echo $reunault ?>>Renault &nbsp;&nbsp;&nbsp;
        <input type="radio" name="marque" id="marque" value="Audi" <?php echo $audi ?>>Audi

        <br>
        <br>

        <label for="model">Model : </label>
        <input type="text" name="model" id="model" value="<?php echo $model ?>">

        <br>
        <br>

        <label for="prix">Prix : </label>
        <input type="text" name="prix" id="prix"  value="<?php echo $prix ?>">

        <br><br>

        <label for="couleur">Couleur : </label>
        <select name="couleur" id="couleur">
            <option value="Noir" <?php echo $selected1 ?>>Noir</option>
            <option value="Bleu" <?php echo $selected2 ?>>bleu</option>
            <option value="Gris" <?php echo $selected3 ?>>Gris</option>
            <option value="Vers" <?php echo $selected4 ?>>Vers</option>
            <option value="Jeune" <?php echo $selected5 ?>>Jeune</option>
        </select>

        <br>
        <br>

        <label>Les Options : </label><br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="checkbox" name="Airbag" value="Air Bag" <?php echo $ckd1 ?>>Air Bag <br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="checkbox" name="Climatisation" value="Climatisation" <?php echo $ckd2 ?>>Climatisation <br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="checkbox" name="FreinsAbs"  value="Freins Abs" <?php echo $ckd3 ?>>Freins Abs

        <br><br>

        <input type="submit" name="btn">

    </form>
    <p>
        <?php 

if (isset($_POST["btn"])){
            $V1->Affiche();
}
            /*if (isset($_POST["btn"])){
                echo "Numéro Chassis : $nbchassis <br>";
                echo "Marque : $marque <br>";
                echo "Model : $model <br>";
                echo "Prix : $prix <br>";
                echo "Couleur : $couleur <br>";
                echo "Les Options : <br>";
                if ($ckd1 != ""){
                    echo "Air bag <br>";
                }
                if ($ckd2 != ""){
                    echo "Clmimatisation <br>";
                }
                if ($ckd3 != ""){
                    echo "Freins Abs";
                }
                

            }*/
        
        ?>
    </p>
    
</body>
</html>