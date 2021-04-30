<?php
include('./lib/php/verifier_connexion.php');

if (isset($_SESSION['admin'])) {
    ?>

    <p>&nbsp;</p>
    <h1 class="h1">Ajouter / Modifier / Supprimer un utilisateur</h1>
    <p>&nbsp;</p>

    <?php
    $utilisateur = new UtilisateurBD($cnx);

    if (isset($_GET['editer'])) {
        extract($_GET, EXTR_OVERWRITE);
        $utili = $utilisateur->mise_a_jourUtilisateur($id_utili);
    }

    if (isset($_GET['inserer'])) {
        $prod = $utilisateur->ajoutUtilisateur();
    }

    if (isset($_GET['supprimer'])) {
        extract($_GET, EXTR_OVERWRITE);
        $utili = $utilisateur->supprimerUtilisateur($id_utili);
    }

    ?>

    <p> Pour le login, si vous voulez modifier ou supprimer un utilisateur. Entrez le login de l'utilisateur recherché.</p>
    <p> Si vous voulez enregistrer un nouvel utilisateur. Entrez un login ne se trouvant pas encore dans la base de données.</p>
    <br>
    <br>

    <form class="row g-3" action="<?php print $_SERVER['PHP_SELF']; ?>" method="get">
        <div class="col-md-2">
            <label for="loginutilisateur" class="form-label">Login</label>
            <input type="text" class="form-control" id="loginutilisateur" name="loginutilisateur"
                   placeholder="1 ou A1 ou autre">
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
            <input type="hidden" name="id_utili" id="id_utili">
            <button type="submit" class="btn btn-primary" id="editer" name="editer">Mettre à jour</button>
            <button type="submit" class="btn btn-primary" id="inserer" name="inserer">Enregistrer</button>
            <button type="submit" class="btn btn-primary" id="supprimer" name="supprimer">Supprimer</button>
        </div>
    </form>

    <?php
}
?>