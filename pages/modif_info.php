<p>&nbsp;</p>
<h1 class="h1">Modifier les informations du compte</h1>
<p>&nbsp;</p>

<?php
$utilisateur = new UtilisateurBD($cnx);

if (isset($_GET['editer'])) {
    extract($_GET, EXTR_OVERWRITE);
    $utili = $utilisateur->mise_a_jourUtilisateur($id_utili);
}

?>

<form class="row g-3" action="<?php print $_SERVER['PHP_SELF']; ?>" method="get">
    <div class="col-md-2">
        <label for="referenceutilisateur2" class="form-label">Référence</label>
        <input type="text" class="form-control" id="referenceutilisateur2" name="referenceutilisateur2">
    </div>
    <div class="col-md-2">
        <label for="nom_utili2" class="form-label">Nom</label>
        <input type="text" class="form-control" id="nom_utili2" name="nom_utili2">
    </div>
    <div class="col-2">
        <label for="prenom2" class="form-label">Prénom</label>
        <input type="text" class="form-control" id="prenom2" name="prenom2">
    </div>
    <div class="col-md-2">
        <label for="login2" class="form-label">Login</label>
        <input type="text" class="form-control" id="login2" name="login2">
    </div>
    <div class="col-md-2">
        <label for="password2" class="form-label">Mot de passe</label>
        <input type="text" class="form-control" id="password2" name="password2">
    </div>
    <div class="col-md-3">
        <label for="rue2" class="form-label">Rue</label>
        <input type="text" class="form-control" id="rue2" name="rue2">
    </div>
    <div class="col-md-2">
        <label for="num2" class="form-label">Numéro de maison</label>
        <input type="number" class="form-control" id="num2" name="num2">
    </div>
    <div class="col-md-2">
        <label for="pays2" class="form-label">Pays</label>
        <input type="text" class="form-control" id="pays2" name="pays2">
    </div>
    <div class="col-md-2">
        <label for="ville2" class="form-label">Ville</label>
        <input type="text" class="form-control" id="ville2" name="ville2">
    </div>

    <div class="col-12">
        <input type="hidden" name="id_utili2" id="id_utili2">
        <button type="submit" class="btn btn-primary" id="editer" name="editer">Mettre à jour</button>
    </div>
</form>

