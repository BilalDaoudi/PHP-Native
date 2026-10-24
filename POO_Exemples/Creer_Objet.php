<?php

 

include "Stagiaire.php"; // include "Personne.php";
// Objets Personne
$dn=new DateTime("2000-5-9");
$p1=new Personne("Tehiri","Hassan",$dn);
$p1->SetCin("SB7000");
$p1->Afficher();
print("<br/>----------------------------------<br/>");
print($p1);
print("<br/>----------------------------------<br/>");

 

// Objets Stagiaire

 

$d=new DateTime("2001-10-22");
$stg1=new Stagiaire("S111111","El Malki","Fatima",$d,222333,"Dev102");
$stg1->Afficher();
print("<br/>----------------------------------<br/>");
print($stg1);
print("<br/>----------------------------------<br/>");

 


?>