<?php
// Forme 1
// if (condition) { instructions }
// Exemple
echo "-------------------- Forme I : if ... -------------------------- <br>";
$nb = 12;
if ($nb % 2 == 0) {
    print("Nombre " . $nb . " est pair ☻☻ <br><br>");
}
if ($nb % 2 != 0) {
    print("Nombre " . $nb . " est impair ☻☻ <br><br>");
}

// Forme 2
// if (condition) { instructions }  else { instructions }
// Exemple

echo "-------------------- Forme II : if ... else ... -------------------------- <br>";
$nb = 13;
if ($nb % 2 == 0) {
    print("Nombre " . $nb . " est pair ☻☻ <br><br>");
}
else {
    print("Nombre " . $nb . " est impair ☻☻ <br><br>");
}


// Forme 3
// if (condition) { instructions }  elseif { instructions } ... else { instructions }
// Exemple

echo "-------------------- Forme III : if ... elseif ... elseif ... else ... -------------------------- <br>";
$NomArticle = "souris";
$Quantite = 10;
$Prix = 0.0;
if ($NomArticle == "ecran") {
    $Prix = 1200.0;
    $total = $Prix * $Quantite;
    echo "le total est $total DH";
}
elseif ($NomArticle == "souris") {
    $Prix = 100.0;
    $total = $Prix * $Quantite;
    echo "le total est $total DH";
}
elseif ($NomArticle == "clavier") {
    $Prix = 200.0;
    $total = $Prix * $Quantite;
    echo "le total est $total DH";
}
else {
    echo "Mauvaise Saisir !!!";
}


// Forme 4
/* sxitch (variable) {
    case vlaeur1:
        instructions;
        break;
    case vlaeur2:
        instructions;
        break;
    .
    .
    .
    default:
        instructions;
}*/

// Exemple


echo "<br><br>-------------------- Forme IIII : switch -------------------------- <br>";
$Cat = "c";
$NbNuitees = 5;
switch ($Cat) {
    case "a":
    case "A":
        $total = $NbNuitees * 200;
        echo "le total est $total DH";
        break;
    case "b":
    case "B":
        $total = $NbNuitees * 400;
        echo "le total est $total DH";
        break;
    case "c":
    case "C":
        $total = $NbNuitees * 600;
        echo "le total est $total DH";
        break;

    default:
        echo "Mauvaise Saisir !!!";
}





?>