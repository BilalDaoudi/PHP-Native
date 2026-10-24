<?php
require('./fpdf186/fpdf.php');

// Créer une instance de FPDF
$pdf = new FPDF();
$pdf->AddPage();

// Définir la police
$pdf->SetFont('Arial', '', 12);
// $pdf->SetKeywords("مرحبا",true);

// Texte en arabe
$texte_arabe = 'مرحبا';

// Ajouter le texte au document PDF
$pdf->Write(10, $texte_arabe);
$pdf->SetAuthor('مرحبا', true);
// Nom du fichier PDF de sortie
$nom_fichier = 'bonjour_arabe.pdf';

// Sauvegarder le document PDF
$pdf->Output('I', $nom_fichier);

// Afficher un lien pour télécharger le fichier
// echo '<a href="' . $nom_fichier . '">Télécharger le fichier PDF</a>';
?>
