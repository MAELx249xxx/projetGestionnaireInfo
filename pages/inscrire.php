<p>&nbsp;</p>
<h1 class="h1">Créer un compte</h1>
<p>&nbsp;</p>

<?php
$utilisateur = new UtilisateurBD($cnx);

if (isset($_GET['inserer_uti'])) {
    extract($_GET, EXTR_OVERWRITE);
    $utili = $utilisateur->ajoutUtilisateur($login,$nom_utili,$prenom,$password,$rue,$num,$pays,$ville);

    if($utili==1){
        print "Vous allez être rediriger vers la page de connexion sous peu !!!<br><br>";
        ?>
        <meta http-equiv="refresh" : content="2;URL=index_.php?page=se_connecter.php">
        <?php
    }else{
        print "Veuillez enregistrer votre compte avec un autre login !!!<br><br>";
    }
}

?>

<form class="row g-3" action="<?php print $_SERVER['PHP_SELF']; ?>" method="get">
    <div class="col-md-2">
        <label for="login" class="form-label">Login</label>
        <input type="text" class="form-control" id="login" name="login">
    </div>
    <div class="col-md-2">
        <label for="nom_utili" class="form-label">Nom</label>
        <input type="text" class="form-control" id="nom_utili" name="nom_utili">
    </div>
    <div class="col-2">
        <label for="prenom" class="form-label">Prénom</label>
        <input type="text" class="form-control" id="prenom" name="prenom">
    </div>
    <div class="col-md-2">
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
    <div class="col-md-3">
        <label for="rue" class="form-label">Rue</label>
        <input type="text" class="form-control" id="rue" name="rue">
    </div>
    <div class="col-md-2">
        <label for="num" class="form-label">Numéro de maison</label>
        <input type="number" class="form-control" id="num" name="num">
    </div>
    <div class="col-md-2">
        <label for="pays" class="form-label">Pays</label>
        <input type="text" class="form-control" id="pays" name="pays">
    </div>
    <div class="col-md-2">
        <label for="ville" class="form-label">Ville</label>
        <input type="text" class="form-control" id="ville" name="ville">
    </div>

    <div class="col-12">
        <button type="submit" class="btn btn-primary" id="inserer_uti" name="inserer_uti">Enregistrer</button>
    </div>
</form>

