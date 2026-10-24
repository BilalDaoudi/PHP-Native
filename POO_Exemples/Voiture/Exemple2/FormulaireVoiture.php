<?php
include "Voiture.php";
if(isset($_POST['btnAjouter']))
{
    $v1=new Voiture();
    $v1->SetNumeroChassis($_POST['NumeroChassis']);
    $v1->SetMarque($_POST['Marque']);
    $v1->SetModel((int)$_POST['Model']);
    $v1->SetPrix((float)$_POST['Prix']);
    $v1->SetCouleur($_POST['Couleur']);
    if(isset($_POST['AirBag']))
        $v1->SetAirBag(true);
    else
        $v1->SetAirBag(false);
    if(isset($_POST['Climat']))
        $v1->SetClimat(true);
    else
        $v1->SetClimat(false);   
    if(isset($_POST['Abs']))
        $v1->SetAbs(true);
    else
        $v1->SetAbs(false);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Une Voiture</title>
</head>
<body>
    <h2>Caractéristiques Voiture</h2>
    <form action="FormulaireVoiture.php" method="post">
        Numéro Chassis :<input type="text" name="NumeroChassis" ><br><br>
        Marque : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="radio" name="Marque" value="Mercedes" >Mercedes</input>&nbsp;&nbsp;&nbsp;
        <input type="radio" name="Marque" value="Peugeot" >Peugeot</input>&nbsp;&nbsp;&nbsp;
        <input type="radio" name="Marque" value="Renault" >Renault</input>&nbsp;&nbsp;&nbsp;
        <input type="radio" name="Marque" value="Audi" >Audi</input><br><br> 
        Model : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="text" name="Model" ><br><br>
        Prix :   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="text" name="Prix"><br><br>
        Couleur :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <select name="Couleur" >
            <option value="Noir" >Noir</option>
            <option value="Blanc" >Blanc</option>
            <option value="Rouge" >Rouge</option>
            <option value="Bleu" >Bleu</option>
            <option value="Gris" >Gris</option>
        </select><br><br>
        Les Options : <br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="checkbox" name="AirBag" value="Air Bag" >Air Bag</input><br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="checkbox" name="Climat" value="Climatisation" >Climatisation</input><br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="checkbox" name="Abs" value="Freins Abs" >Freins Abs</input><br><br>
        <input type="submit" text="Ajouter" name="btnAjouter" value="Ajouter"/>
    </form>
    <div>
    <?php 
        if(!empty($_POST))
        {
            echo "Caractéristiques de la Voiture :<br>";
            if(!empty($_POST['NumeroChassis']))
                echo "Numéro de Chassis : ",$v1->GetNumeroChassis(),"<br>";
            if(!empty($_POST['Marque']))
                echo "Marque : ",$v1->GetMarque(),"<br>";
            if(!empty($_POST['Model']))
                echo "Model : ",$v1->GetModel(),"<br>";
            if(!empty($_POST['Prix']))
                echo "Marque : ",$v1->GetPrix(),"<br>";
            if(!empty($_POST['Couleur']))
                echo "Couleur : ",$v1->GetCouleur(),"<br>";
            echo "Les Options : <br>";            
            echo "Air Bag : ";
            if($v1->GetAirBag()==1)
                echo "Oui","<br>";
            else
                echo "Non","<br>";
            echo "Climatisation : ";
            if($v1->GetClimat()==1)
                echo "Oui","<br>";
            else
                echo "Non","<br>";
            echo "Freins Abs : ";
            if($v1->GetAbs()==1)
                echo "Oui","<br>";
            else
                echo "Non","<br>";            
        }
  ?>
    </div>  
</body>
</html>