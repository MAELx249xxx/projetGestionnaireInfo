<p>&nbsp;</p>
<h1 class="h1">Acceuil Admin</h1>
<p>&nbsp;</p>

<?php
if (isset($_POST['submit'])) {
    extract($_POST,EXTR_OVERWRITE);

    $ad = new AdminBD($cnx);
    $admin = $ad->getAdmin($login,$password);
    if($admin){
        $_SESSION['admin']=1;
        print "Vous êtes connecté en tant qu'admin, vous pouvez maintenant gérer les produits et les utilisateurs !!!";
    }else{
        $message =  "Identifiants incorrects";
    }
}
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
    </div>
    <button type="submit" class="btn btn-primary" name="submit">Se connecter</button>
</form>