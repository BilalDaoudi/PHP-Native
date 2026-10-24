<?php
 
echo "les Digits :<br/>";
for($i=0;$i<=9;$i++)
{
    echo "$i <br/>";
}
 
echo "<br>---------------------------------------------------------<br/>";
$som=0;
for($i=1;$i<=100;$i++)
{
    $som+=$i;
}
echo "La somme des 100 premiers nombres est : $som <br/>";
echo "<br>---------------------------------------------------------<br/>";
 
echo "<br>-----La fonction ord(...) -----------------------------------------<br/>";
$car="d";
$asc=ord($car);  //Code ASCII
echo "Le Code ASCII du caractère $car est : $asc <br>";  
 
echo "<br>-----La fonction chr(...) -----------------------------------------<br/>";
$asc=50;   // code ASCII
 
$car=chr($asc);
echo "Le Code ASCII $asc correspond au caractère : $car <br>";   //Caractère
 
echo "<br>---------------------------------------------------------<br/>";
echo "Lettres Majuscules Par Boucle :<br>";
for($i=0;$i<=25;$i++)
{
    $LettreMaj=chr(65+$i);
    echo $LettreMaj."<br>";
}
 
echo "<br>---------------------------------------------------------<br/>";
echo "Lettres Minuscule de z à a :<br>";
$asc_z=ord("z");   // $asc_z=122
 
for($i=$asc_z;$i>=$asc_z-25;$i--) // 97= 122 -25 = $asc_z-25
{
    $LettreMin=chr($i);
    echo $LettreMin."<br>";
}
 
?>