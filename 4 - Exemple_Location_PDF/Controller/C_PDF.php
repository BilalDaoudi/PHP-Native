<?php

require '../Model/M_PDF.php';


$pdf = new FPDF('P', 'mm', 'A4');

$articles = [
    [120,"yyyyy",2,240],
    [100,"xxxxx",5,500],
    [50,"bbbbb",20,1000],
    [20,"ddddd",3,60]
];

$page = new PDF($pdf, $articles);


$page->CreatePage();

$page->AfficherPDF();
