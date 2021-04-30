<p>&nbsp;</p>
<h1 class="h1">Créer un compte</h1>
<p>&nbsp;</p>

<?php
$utilisateur = new UtilisateurBD($cnx);

if (isset($_GET['inserer'])) {
    $prod = $utilisateur->ajoutUtilisateur();
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
        <input type="text" class="form-control" id="password" name="password">
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
        <button type="submit" class="btn btn-primary" id="inserer" name="inserer">Enregistrer</button>
    </div>
</form>
