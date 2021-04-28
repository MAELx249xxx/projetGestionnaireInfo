<?php
header('Content-Type: application/json');

include ('../pg_connect.php');
include ('../classes/Connexion.class.php');
include ('../classes/Produit.class.php');
include ('../classes/ProduitBD.class.php');
$cnx = Connexion::getInstance($dsn,$user,$password);
$pr = array();
$produit = new ProduitBD($cnx);

$pr[] = $produit->getProduitById2($_GET['id_prod']);

print json_encode($pr);