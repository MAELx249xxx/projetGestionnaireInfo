<?php
include('../admin/lib/php/pg_connect.php');
include('../admin/lib/php/classes/Connexion.class.php');
include('../admin/lib/php/classes/Produit.class.php');
include('../admin/lib/php/classes/ProduitBD.class.php');

$cnx = Connexion::getInstance($dsn, $user, $password);
$pr = array();
$produit = new ProduitBD($cnx);
$liste = $produit->getAllProduit();
$nbr = count($liste);

include('../admin/lib/php/TCPDF/tcpdf.php');
$pdf = new TCPDF('P', 'mm', 'A4');

$pdf->AddPage();

$pdf->SetFont('Helvetica', 'B', 15);
$pdf->Cell(190, 10, 'Nos produits', 1, 1, 'C');

$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('Helvetica', '', 12);
$pdf->ln();
$pdf->ln(2);

$pdf->SetFont('Helvetica','B',11);

$pdf->cell(10, 5, "Id", 1);
$pdf->cell(30, 5, "Nom produit", 1);
$pdf->cell(30, 5, "Prix", 1);
$pdf->cell(30,5,"Année de prod",1);
$pdf->cell(40,5,"Constructeur",1);
$pdf->cell(40,5,"Catégorie",1);
$pdf->cell(10,5,"Ref",1);

$pdf->SetFont('Helvetica','',12);


$pdf->ln();
for ($i = 0; $i < $nbr; $i++) {
    $pdf->cell(10, 5, $liste[$i]->id_prod, 1);
    $pdf->cell(30, 5, $liste[$i]->nom_prod, 1);
    $pdf->cell(30, 5, $liste[$i]->prix, 1);
    $pdf->cell(30,5,$liste[$i]->annee_prod,1);
    $pdf->cell(40,5,$liste[$i]->nom_const,1);
    $pdf->cell(40,5,$liste[$i]->nom_cat,1);
    $pdf->cell(10,5,$liste[$i]->reference,1);
    $pdf->ln();

}





$pdf->Output('liste_des_produits.pdf', 'I');