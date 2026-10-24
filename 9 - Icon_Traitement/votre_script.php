<?php
// Votre traitement PHP ici
// ...
// Génération de la réponse
$T = [];
$som = 0;

for($i = 0 ; $i<10000000000000000000 ; $i++){
    $T[] = $i;
}

foreach($T as $t){
    $som += $t;
}

$response = "Réponse de la requête";
echo $response;
?>
