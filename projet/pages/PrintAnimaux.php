<?php

require '../admin/lib/php/dbConnect.php';
require '../admin/lib/php/classes/Connexion.class.php';
require '../admin/lib/php/classes/Vue_animauxDB.class.php';

$cnx = Connexion::getInstance($dsn, $user, $pass);

$animaux = new Vue_animauxDB($cnx);
$liste = $animaux->getListeTousAnimaux();
$nbr = count($liste);

require ('../admin/lib/php/fpdf/fpdf.php');

$pdf = new FPDF('P', 'cm', 'A4');
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 14);
$pdf->SetDrawColor(180, 0, 0);
$pdf->SetFillColor(180, 0, 0);
$pdf->SetTextColor(255, 255, 255);
$pdf->SetXY(3, 3);
$pdf->Cell(16, 1, 'Liste des produits', 1, 1, 'L', 1);
$pdf->SetXY(3, 4);
$pdf->Cell(16, 1, 'nom de l animal         prix              sexe             age', 1, 1, 'L', 1);


$pdf->SetDrawColor(0, 0, 0);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('Arial', '', 12);
$pdf->SetXY(2.5, 4);
$x = 2.5;
$y = 5.5;

for ($i = 0; $i < $nbr; $i++) {
    $pdf->SetXY($x + 0.5, $y);
    $pdf->Cell(16, 1, $liste[$i]['nom_animaux'], 0, 1, 'L', 1);
    $pdf->SetXY(8, $y);
    $pdf->Cell(16, 1, $liste[$i]['prix_unitaire'], 0, 1, 'L', 1);
    $pdf->SetXY(11, $y);

    $pdf->Cell(16, 1, $liste[$i]['sexe_animaux'], 0, 1, 'L', 1);
    $pdf->SetXY(14, $y);
    $pdf->Cell(16, 1, $liste[$i]['age_animaux'], 0, 1, 'L', 1);
    $pdf->SetXY(15, $y);
    
   // $pdf->Cell(-3,1,'',0,0);
    //$pdf->Image('../admin/images/' . $liste[$i]['image'],0,0,2,2);


    $y+=0.8;
}
$pdf->Output();
?>