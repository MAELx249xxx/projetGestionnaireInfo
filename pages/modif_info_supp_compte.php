<p>&nbsp;</p>
<h1 class="h1">Modifier les informations du compte / Suppression du compte</h1>
<p>&nbsp;</p>


<?php
$utilisateur = new UtilisateurBD($cnx);

if (isset($_GET['supprimer'])) {
    extract($_GET, EXTR_OVERWRITE);
    $utili = $utilisateur->supprimerUtilisateur($id_utili2);

    session_destroy();

    ?>
    <meta http-equiv="refresh" : content="2;URL=index_.php">
    <?php
}

?>

<p>Supprimer son compte est une action irréversible !!!</p>

<form class="row g-3" action="<?php print $_SERVER['PHP_SELF']; ?>" method="get">
    <div class="col-md-2">
        <label for="loginutilisateur2" class="form-label">Login</label>
        <input type="text" class="form-control" id="loginutilisateur2" name="loginutilisateur2"
               value="<?php print $_SESSION['login']; ?>">
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
        <label for="password2" class="form-label">Mot de passe</label>
        <input type="password" class="form-control" id="password2" name="password2">
        <input type="checkbox" onclick="mdp()">Montrer le mot de passe
        <script>
            function mdp() {
                var x = document.getElementById("password2");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
            }
        </script>
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
        <button type="submit" class="btn btn-primary" id="supprimer" name="supprimer">Supprimer le compte</button>
    </div>
</form>

<button type="submit" class="btn btn-primary" id="editer_uti" name="editer_uti">Mettre à jour</button>

