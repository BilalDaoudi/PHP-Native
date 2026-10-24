<?php
require __DIR__ . '/vendor/autoload.php';
require "./I18N/Arabic.php";

use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\EscposImage;

// 1. Générer une image PNG avec du texte arabe
function imagettftext_bold($im, $size, $angle, $x, $y, $color, $fontfile, $text) {
    // Dessiner le texte 4 fois avec un léger décalage pour épaissir le rendu
    imagettftext($im, $size, $angle, $x,     $y,     $color, $fontfile, $text);
    imagettftext($im, $size, $angle, $x + 1, $y,     $color, $fontfile, $text);
    imagettftext($im, $size, $angle, $x,     $y + 1, $color, $fontfile, $text);
    imagettftext($im, $size, $angle, $x + 1, $y + 1, $color, $fontfile, $text);
}

function createArabicImage($filename, $text, $fontPath) {
    $width = 384; // Largeur courante pour une imprimante 58mm
    $height = 100;

    // Créer une image vide en blanc
    $im = imagecreatetruecolor($width, $height);
    $white = imagecolorallocate($im, 255, 255, 255);
    $black = imagecolorallocate($im, 0, 0, 0);
    imagefilledrectangle($im, 0, 0, $width, $height, $white);

    // Ajouter le texte arabe en gras (avec la fonction personnalisée)
    $fontSize = 15;
    $angle = 0;
    $x = 10;
    $y = 50;

    imagettftext_bold($im, $fontSize, $angle, $x, $y, $black, $fontPath, $text);

    // Dessiner une bordure noire autour de l'image
    imagerectangle($im, 0, 0, $width - 1, $height - 1, $black);

    // Sauvegarder l'image au format PNG
    imagepng($im, $filename);
    imagedestroy($im);
}


// Chemin vers la police (assure-toi qu'elle est dans le dossier)
$font = __DIR__ . '/Amiri-Regular.ttf';



// Texte arabe à imprimer
$textArabe = "مرحباً بك في متجرنا!";

$arabic = new I18N_Arabic('Glyphs');
$textArabe = "papier pour brigolage express junior بلت تيستثي سنتهثص هتص ثنخنب ";
$textArabe = $arabic->utf8Glyphs($textArabe);

// Nom du fichier image généré
$imageFile = __DIR__ . '/ticket_arabe.png';

// Générer l'image
createArabicImage($imageFile, $textArabe, $font);

// 2. Imprimer l'image avec escpos-php
try {
    // Remplace "POS-58" par le nom de ton imprimante (Windows)
    $connector = new WindowsPrintConnector("581P");
    $printer = new Printer($connector);

    // Charger l'image générée
    $image = EscposImage::load($imageFile, false);

    // Imprimer l'image
    $printer->bitImage($image);

    $printer->feed(3);
    $printer->cut();
    $printer->close();

    echo "Impression terminée avec succès.\n";
} catch (Exception $e) {
    echo "Erreur d'impression : " . $e->getMessage() . "\n";
}
?>
