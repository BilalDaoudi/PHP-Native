<?php


//Fonction pour Sommer 2 Nombres 
//Définition 
function Sommer($a,$b)
{
 $som=$a+$b; 
 return $som; 
 //ou 
 //return $a+$b; 
}
//Définition Typée 
function SommerType(int $n1,int $n2):int 
{
 return $n1+$n2; 
}
//définition
function Operation(int $n1,string $op,int $n2) 
{
 if($op=='+') 
 echo $n1 + $n2; 
 if($op=='-') 
 echo $n1 - $n2; 
 if($op=='*') 
  echo $n1 * $n2; 
 if($op=='%') 
  echo $n1 % $n2; 
 if($op=='/') 
 if ($n2 != 0) 
 echo $n1 / $n2; 
 else 
 echo "Division par Zéro"; 
 echo "\n"; 
}
$nb1=250.6;
$nb2=100; 
//Appel de Sommer 
$Resultat=Sommer($nb1,$nb2);
echo $Resultat,"\n"; 


//Appel de SommerType 
$Som=SommerType($nb1,$nb2); 
echo $Som,"\n";; 




//Saisie Mode Console 
$nbr1=(int)readline("Donner le nombre 1 :"); 
$opr=readline("Donner l'opérateur :"); 
$nbr2=(int)readline("Donner le nombre 2 :"); 
//Appel de Operation 
echo "Le Résultat est :"; 
Operation($nbr1,$opr,$nbr2); 
/* 
echo "Le Produit est :"; 
Operation(100,'*',3); 
echo "La Soustraction est :"; 
Operation(75,'-',55); 
echo "Le Modulo est :"; 
Operation(20,'%',3); 
echo "La Division est :"; 
Operation(20,'/',3); 
*/ 


?>