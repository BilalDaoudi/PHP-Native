<?php
/*
pour Afficher le Tabeau Associatif : $_POST
print_r($_POST);
*/
$nb1="";
$nb2="";
$som="";
$Erreurs="";
if(isset($_POST['btnSommer']))// btnSommer cliqué
{
    if(!empty($_POST['tNb1']))
        $nb1=(float)$_POST['tNb1'];
    else
    $Erreurs.="Saisir le Nombre 1 <br/>";
    if(!empty($_POST['tNb2']))
        $nb2=(float)$_POST['tNb2'];
    else
        $Erreurs.="Saisir le Nombre 2 <br/>";
    if(!empty($_POST['tNb1']) and !empty($_POST['tNb2']))
        $som=$nb1+$nb2;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Somme 2 Nombres</title>
</head>
<body>
     <form action="Somme.php" method="post">
         <h2>Somme de 2 Nombres</h2>
         
         <label>Nombre 1 :</label>
         <input type="text" name="tNb1" value="<?php echo $nb1; ?>"><br><br>

         <label>Nombre 2 :</label>
         <input type="text" name="tNb2" value="<?php echo $nb2; ?>"><br><br>
         
         <button type="submit" name="btnSommer">Somme</button>
        <label id="lblSomme"><?php echo $som; ?></label><br>
        
     </form>
     <?php
     if(isset($_POST['btnSommer']) and (!empty($Erreurs)))
        { ?>
            <div id="Erreurs" style="background-color:aqua;width:25%">
            <span style="color:red"><?php echo $Erreurs; ?> </span>
            </div>           
        <?php } ?>
</body>
</html>