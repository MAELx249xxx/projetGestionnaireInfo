<p>&nbsp;</p>
<h1 class="h1">Page de connexion</h1>
<p>&nbsp;</p>

<?php
if (isset($_POST['submit'])) {
    extract($_POST, EXTR_OVERWRITE);

    $uti = new UtilisateurBD($cnx);
    $utilisateur = $uti->getUti($login, $password);
    if ($utilisateur) {
        $_SESSION['utilisateur'] = 1;
        $_SESSION['login'] = $login;
        ?>
        <meta http-equiv="refresh": content="1;URL=index_.php?page=accueil.php">
        <?php
    } else {
        $message = "Identifiants incorrects";
    }
}
?>

<?php
if (!isset($_SESSION['utilisateur'])) {

?>

<p class=""><?php
    if (isset($message)) {
        print $message;
    }
    ?></p>

<form action="<?php print $_SERVER['PHP_SELF']; ?>" method="post">
    <div class="mb-3">
        <label for="login" class="form-label">Identifiant</label>
        <input type="login" class="form-control" id="loginr" aria-describedby="" name="login">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Mot de passe</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>
    <button type="submit" class="btn btn-primary" name="submit">Se connecter</button>
</form>

    <?php
}
?>


<?php
if (isset($_SESSION['utilisateur'])) {


    print "Vous êtes bien connecté " .$_SESSION['login']. ".";
}
?>