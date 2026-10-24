<?php
$Semaine=["lu"=>"Lundi","ma"=>"Mardi","me"=>"Mercredi"];
print_r($Semaine);
$Semaine["je"]="Jeudi";
$Semaine["ve"]="Vendredi";
$Semaine["sa"]="samedi";
$Semaine["di"]="Dimance";
print_r($Semaine);
 
$Employe=['Matricule'=>9800,'Nom'=>'El Malki','Prenom'=>'Hassan','Salaire'=>9500.00];
print_r($Employe);
$mat=$Employe['Matricule']; 
echo "Matricule de l'employé est :", $mat, "\n";
$Employe['Cin']="SB17000";
print_r($Employe);
unset($Employe['Prenom']);
print_r($Employe);
//Boucle foreach
echo "\n---------------Les valeurs--------------------       -----\n";
foreach($Employe as $val)
{
    echo $val,"\n";
}
echo "\n---------------Les Clés et Valeurs-------------------------\n";
foreach($Employe as $key=> $val)
{
    print("La clé est : $key\tLa valeur est: $val \n");
}
echo "\n-----------------Les Clés par array_Keys--------------------\n";
 
$cles=array_keys($Employe); // $cles est un Tableau avec indice
print_r($cles);
echo "\n-----------------Les Valeurs par array_values--------------------\n";
$Valeurs=array_values($Employe); // $valeurs est un Tableau avec indice
print_r($Valeurs);
echo "\n-----------------Les Clés par array_Keys--------------------\n";
 
$TEmployes=[
    ['Matricule'=>9800,
     'Nom'=>'El Malki',
     'Prenom'=>'Hassan',
     'Salaire'=>9500.00],
    ['Matricule'=>14500,
     'Nom'=>'El Malki',
     'Prenom'=>'Hassan',
     'Salaire'=>9500.00],
    ['Matricule'=>6003,
     'Nom'=>'El Malki',
     'Prenom'=>'Hassan',
     'Salaire'=>9500.00] 
];
print_r($TEmployes);
echo $TEmployes[1]['Matricule'];
 
?>