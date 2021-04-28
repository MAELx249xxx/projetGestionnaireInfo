<?php
header('Content-Type: application/json');

include ('../pg_connect.php');
include ('../classes/Connexion.class.php');
include ('../classes/Admin.class.php');
include ('../classes/AdminBD.class.php');

$cnx = Connexion::getInstance($dsn,$user,$password);

$ad = array();
$adm = new AdminBD($cnx);

$ad[] = $adm->getAdminByReference($_GET['reference']);

print json_encode($ad);