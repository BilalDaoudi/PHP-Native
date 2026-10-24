<?php
require "../Models/Emploi.php";
session_start();



if (!isset($_SESSION["User"]))
	header("location:Login.php");


$_SESSION['Page_Actual'] = 'Emploi de temps';	

$emploi = new Emploi();
$emploi_formateur = $emploi->GetEmploiByFormateur($_SESSION["User"][0]);
$T_Jour = ["Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi"];
$T_Jours = [
	[["", ""], ["", ""], ["", ""], ["", ""]],
	[["", ""], ["", ""], ["", ""], ["", ""]],
	[["", ""], ["", ""], ["", ""], ["", ""]],
	[["", ""], ["", ""], ["", ""], ["", ""]],
	[["", ""], ["", ""], ["", ""], ["", ""]],
	[["", ""], ["", ""], ["", ""], ["", ""]]
];
foreach ($emploi_formateur as $Day) {
	for ($j = 0; $j < 6; $j++) {
		if ($T_Jour[$j] == $Day[0]) {
			for ($i = 0; $i < 4; $i++) {
				if ($i + 1 == $Day[1]) {
					$T_Jours[$j][$i] = [$Day[2], $Day[5]];
				}
			}
		}
	}
}

require "../Views/Emploi.php";
