<?php
header('Content-Type: application/json');

include ('../pg_connect.php');
include ('../classes/Connexion.class.php');
include ('../classes/Categorie.class.php');
include ('../classes/CategorieBD.class.php');

$cnx = Connexion::getInstance($dsn,$user,$password);

$cat = array();
$cate = new CategorieBD($cnx);

$cat[] = $cate->getCatByReference($_GET['reference']);

print json_encode($cat);