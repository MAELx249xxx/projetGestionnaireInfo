<?php
if(!isset($_SESSION['admin'])){
    print "Accès réservé, vous n'avez pas le droit d'être ici !!";
    session_destroy();
    ?>
    <meta http-equiv="refresh": content="2;URL=../index_.php">
    <?php
}
?>