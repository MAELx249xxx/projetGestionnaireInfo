<?php
header('Content-Type: application/json');

include ('../pg_connect.php');
include ('../classes/Connexion.class.php');
include ('../classes/Utilisateur.class.php');
include ('../classes/UtilisateurBD.class.php');

$cnx = Connexion::getInstance($dsn,$user,$password);

$ut = array();
$utili = new UtilisateurBD($cnx);

extract($_GET,EXTR_OVERWRITE);

$ut[] = $utili->majUtilisateur($id_utili,$login,$nom,$prenom,$password,$rue,$num,$pays,$ville);

print json_encode($ut);