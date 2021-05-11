<?php
header('Content-Type: application/json');

include ('../pg_connect.php');
include ('../classes/Connexion.class.php');
include ('../classes/Produit.class.php');
include ('../classes/ProduitBD.class.php');

$cnx = Connexion::getInstance($dsn,$user,$password);

$pr = array();
$prod = new ProduitBD($cnx);

extract($_GET,EXTR_OVERWRITE);

$pr[] = $prod->majProduit($id_prod,$nom_prod,$prix,$annee_prod,$id_const,$id_cat,$reference);

print json_encode($pr);