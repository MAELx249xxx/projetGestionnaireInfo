<?php
include('./lib/php/verifier_connexion.php');

if (isset($_SESSION['admin'])) {

    ?>

    <p>&nbsp;</p>
    <h1 class="h1">Ajouter / Modifier / Supprimer un admin</h1>
    <p>&nbsp;</p>

    <?php
    $admin = new AdminBD($cnx);

    if (isset($_GET['editer'])) {
        extract($_GET, EXTR_OVERWRITE);
        $adm = $admin->mise_a_jourAdmin($id_admin);
    }

    if (isset($_GET['inserer'])) {
        $adm = $admin->ajoutAdmin();
    }

    if (isset($_GET['supprimer'])) {
        extract($_GET, EXTR_OVERWRITE);
        $amd = $admin->supprimerAdmin($id_admin);
    }

    ?>

    <p> Pour la référence, si vous voulez modifier ou supprimer un admin. Entrez la référence de l'admin recherché.</p>
    <p> Si vous voulez enregistrer un nouvel admin. Entrez une référence ne se trouvant pas encore dans la base de données.</p>
    <br>
    <br>

    <form class="row g-3" action="<?php print $_SERVER['PHP_SELF']; ?>" method="get">
        <div class="col-md-2">
            <label for="referenceadmin" class="form-label">Référence</label>
            <input type="text" class="form-control" id="referenceadmin" name="referenceadmin" placeholder="1 ou A1 ou autre">
        </div>
        <div class="col-md-2">
            <label for="login" class="form-label">Identifiant</label>
            <input type="text" class="form-control" id="login" name="login">
        </div>
        <div class="col-2">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="text" class="form-control" id="password" name="password">
        </div>

        <div class="col-12">
            <input type="hidden" name="id_admin" id="id_admin">
            <button type="submit" class="btn btn-primary" id="editer" name="editer">Mettre à jour</button>
            <button type="submit" class="btn btn-primary" id="inserer" name="inserer">Enregistrer</button>
            <button type="submit" class="btn btn-primary" id="supprimer" name="supprimer">Supprimer</button>
        </div>
    </form>

    <?php
}
?>