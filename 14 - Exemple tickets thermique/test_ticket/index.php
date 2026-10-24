<?php
require __DIR__ . '/vendor/autoload.php';
use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

try {
    // Nom de l'imprimante tel qu'affiché sous Windows
    $connector = new WindowsPrintConnector("581P");
    $printer = new Printer($connector);



    $printer->selectCharacterTable(0); // Table de caractères standard
    $printer->setJustification(Printer::JUSTIFY_CENTER);

    // Gras ON
    $printer->setEmphasis(true);
    $printer->text("Fack You Issam Ihadadden نتنن\n");
    $printer->setEmphasis(false); // Gras OFF

   
    $printer->feed(3); // Espace en bas
    $printer->cut();

    $printer->close();
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage();
}

// require_once __DIR__ . '/vendor/autoload.php';
// require_once __DIR__ . '/I18N/Arabic.php';

// use Mike42\Escpos\Printer;
// use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

// // Étape 1 : Transformer le texte arabe avec la classe Glyphs
// $arabic = new I18N_Arabic('Glyphs');
// $texte = "مرحبا بك في عالم الطباعة";


// echo $texte;
// $texteTransforme = $arabic->utf8Glyphs($texte); // Arrange les lettres correctement
// echo $texteTransforme;
// // Étape 2 : Préparer l'imprimante
// try {
//     // Remplace "POS-58" par le nom de ton imprimante partagée sous Windows
//     $connector = new WindowsPrintConnector("581P");
//     $printer = new Printer($connector);

//     // Si besoin, tu peux définir un encodage si ton imprimante le permet :
//     // $printer->selectCharacterTable(0); // 0 = PC437 USA, dépend de ton imprimante

//     // Étape 3 : Imprimer le texte transformé
//     $printer->text($texteTransforme . "\n");

//     $printer->cut();
//     $printer->close();
// } catch (Exception $e) {
//     echo "Erreur d'impression : " . $e->getMessage();
// }
