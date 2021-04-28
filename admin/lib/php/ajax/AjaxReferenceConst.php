<?php
header('Content-Type: application/json');

include ('../pg_connect.php');
include ('../classes/Connexion.class.php');
include ('../classes/Constructeur.class.php');
include ('../classes/ConstructeurBD.class.php');

$cnx = Connexion::getInstance($dsn,$user,$password);

$cons = array();
$const = new ConstructeurBD($cnx);

$cons[] = $const->getConstructeurByReference($_GET['reference']);

print json_encode($cons);