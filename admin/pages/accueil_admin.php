<p>&nbsp;</p>
<h1 class="h1">Accueil Admin</h1>
<p>&nbsp;</p>

<?php
if (isset($_POST['submit'])) {
    extract($_POST,EXTR_OVERWRITE);

    $ad = new AdminBD($cnx);
    $admin = $ad->getAdmin($login,$password);

    if($admin){
        $_SESSION['admin']=1;
        $_SESSION['login2'] = $login;

        print "La page va se raffraichir sous peu et vous pourrez naviguer et gérer les différentes tables de la BD !!!";
        ?>
        <meta http-equiv="refresh": content="3;URL=index_.php">
        <?php
    }else{
        $message =  "Identifiants incorrects";
    }
}
?>

<?php
if (!isset($_SESSION['admin'])) {

    ?>

<p class=""><?php
    if(isset($message)){
        print $message;
    }
    ?></p>

<form action="<?php print $_SERVER['PHP_SELF'];?>" method="post">
    <div class="mb-3">
        <label for="login" class="form-label">Identifiant</label>
        <input type="login" class="form-control" id="login" aria-describedby="" name="login">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Mot de passe</label>
        <input type="password" class="form-control" id="password" name="password">
        <input type="checkbox" onclick="mdp()">Montrer le mot de passe
        <script>
            function mdp() {
                var x = document.getElementById("password");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
            }
        </script>
    </div>
    <button type="submit" class="btn btn-primary" name="submit">Se connecter</button>
</form>

    <?php
}
?>


<?php
if (isset($_SESSION['admin'])) {


    print "Vous êtes bien connecté " .$_SESSION['login2']. ".";
}
?>