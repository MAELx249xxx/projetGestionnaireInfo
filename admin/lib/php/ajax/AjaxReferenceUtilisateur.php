<?php
header('Content-Type: application/json');

include ('../pg_connect.php');
include ('../classes/Connexion.class.php');
include ('../classes/Utilisateur.class.php');
include ('../classes/UtilisateurBD.class.php');

$cnx = Connexion::getInstance($dsn,$user,$password);

$ut = array();
$utili = new UtilisateurBD($cnx);

$ut[] = $utili->getUtilisateurByReference($_GET['reference']);

print json_encode($ut);