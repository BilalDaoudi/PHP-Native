<?php
require __DIR__ . '/vendor/autoload.php';

use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

// Le nom de l'imprimante partagée (Windows)
$connector = new WindowsPrintConnector("581P"); // Remplace par le nom de ton imprimante

$printer = new Printer($connector);

// Exemple de texte arabe (il sera imprimé à l’envers sans traitement)
$texteArabe = "مرحباً بك في متجرنا!";

// 🔁 Inversion manuelle du texte pour l’imprimante thermique (car l’arabe est RTL)
$texteArabeInversé = implode(" ", array_reverse(explode(" ", $texteArabe)));

echo $texteArabeInversé;
$printer->setJustification(Printer::JUSTIFY_CENTER);
$printer->text("****** REÇU ******\n\n");
$printer->text($texteArabeInversé . "\n\n");
$printer->text("شكراً لتسوقكم معنا!\n");

$printer->feed(4);
$printer->cut();
$printer->close();
?>
