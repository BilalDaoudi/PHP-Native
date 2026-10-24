<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
   // print_r($_POST);
    $prix = "";
    $nbnuite = "";
    $red = "";
    $total = "";
    $selecedA = "";
    $selecedB = "";
    $selecedC = "";
    $selecedD = "";
    $checked0 = "checked";
    $checked1 = "";
    $checked2 = "";
    $checked3 = "";
    $erreur = "";
    if (isset($_POST["btnTotal"])){
        $prix = (float)$_POST["cat"];
        if ($prix == 200){
            $selecedA = "selected";
            $selecedB = "";
            $selecedC = "";
            $selecedD = "";
        }
        if ($prix == 400){
            $selecedA = "";
            $selecedB = "selected";
            $selecedC = "";
            $selecedD = "";
        }
        if ($prix == 600){
            $selecedA = "";
            $selecedB = "";
            $selecedC = "selected";
            $selecedD = "";
        }
        if ($prix == 1000){
            $selecedA = "";
            $selecedB = "";
            $selecedC = "";
            $selecedD = "selected";
        }
        if (!empty($_POST["nbnuite"])){
            $nbnuite = (int)$_POST["nbnuite"];
        }
        else{
            $nbnuite = "Saisir le Nombre de Nuitée";
        }
        $red = (float)$_POST["red"];
        if ($red == 0.0){
            $checked0 = "checked";
            $checked1 = "";
            $checked2 = "";
            $checked3 = "";
        }
        if ($red == 0.05){
            $checked0 = "";
            $checked1 = "checked";
            $checked2 = "";
            $checked3 = "";
        }
        if ($red == 0.1){
            $checked0 = "";
            $checked1 = "";
            $checked2 = "checked";
            $checked3 = "";
        }
        if ($red == 0.2){
            $checked0 = "";
            $checked1 = "";
            $checked2 = "";
            $checked3 = "checked";
        }
        if (!empty($_POST["nbnuite"])){
        $total = $prix * $nbnuite * (1-$red);
}
    }
?>

<form action="Hotel.php" method="post">
    <label for="cat">Choisir Catégorie :</label>
    <select name="cat" id="cat"> 
        <option value="200" <?php echo $selecedA ?>>A 200DH</option>
        <option value="400" <?php echo $selecedB ?>>B 400DH</option>
        <option value="600" <?php echo $selecedC ?>>C 600DH</option>
        <option value="1000" <?php echo $selecedD ?>>D 1000DH</option>
    </select>
    <br>
    <br>
    <label for="nbnuite">Nombre Nuitée :</label>
    &nbsp;&nbsp;
    <input type="text" name="nbnuite" id="nbnuite" value="<?php echo $nbnuite ?>" style="color:gold;">
    <br>
    <br>
    <label for="red">Réduction :</label>
    <input type="radio" name="red" value="0.0" <?php echo $checked0 ?>> 0% <br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="radio" name="red" value="0.05" <?php echo $checked1 ?>> 5% <br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="radio" name="red" value="0.1" <?php echo $checked2 ?>> 10% <br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="radio" name="red" value="0.2" <?php echo $checked3 ?>> 20% <br>

    <input type="submit" value="Total" name="btnTotal">
    <label name="resultat"><?php echo $total ?></label>
    <br>
    <br>
    <br>
    

</form>    
</body>
</html>