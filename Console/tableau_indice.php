<?php
 
//Déclaration d'un Tableau : 1
$T=array(12.5,15,9,17.25); // PHP Version Antérieur
//La Longueur d'un Tableau
$N=count($T);
echo "Nombre d'Eléments est : $N \n";
//La fonction print_r
print_r($T);
print("\n");
// Déclaration d'un Tableau : 2
$TNom=["Tahiri","Hakimi","El Malki","Nitaa","Badi"];
print_r($TNom);
print("\n");
$TNotes=[]; //Tableau Vide
$TNotes[0]=15.25;
$TNotes[]=8.5; // Ajouter à la Fin
$TNotes[]=17.5;
$TNotes[]=15.5;
$TNotes[]=6;
print_r($TNotes);
print("\n");
$N=count($TNotes); //Afficher les Valeurs d'un Tableau
for($i=0;$i<=$N-1;$i++)
{    print("$TNotes[$i] \n");
}
//Suppression avec unset()
unset($TNotes[2]); // Supprime la case et son indice
print_r($TNotes);
print("\n");
//Suppression avec array_splice() : arrangement des indices
array_splice($TNom,3,1);
print_r($TNom);
print("\n");
 
//Exemple :Somme, Min , Max , moyenne
$N=(int)readline("Donner le nombre de notes :");
$Notes=[]; // Tableau Vide
$Som=0.0;
for($i=0;$i<=$N-1;$i++)
{
    $p=$i+1;
    $note=(float)readline("Donner la note $p :");
    $Som+=$note;
    $Notes[$i]=$note; // avec ou sans indice
}
print("La Somme est : $Som \n");
$Moy=$Som/$N;
print("La Moyenne est : $Moy \n");
print("\n");
 
//La fonction array_sum
echo "Moyenne :",array_sum($Notes)/count($Notes),"\n";
sort($Notes);
print_r($Notes);
print("\n");
print("Le minimum est : $Notes[0] \n");
print("\n");
$der=$N-1;
print("Le maximum est : $Notes[$der] \n");
print("\n");
?>