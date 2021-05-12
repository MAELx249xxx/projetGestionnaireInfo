<?php
include('./lib/php/verifier_connexion.php');

if (isset($_SESSION['admin'])) {

    ?>

    <p>&nbsp;</p>
    <h1 class="h1">Ajouter / Modifier / Supprimer un admin</h1>
    <p>&nbsp;</p>

    <?php
    $admin = new AdminBD($cnx);
    $liste = $admin->getAllAdmin();
    $nbr = count($liste);

    $nbr = $nbr+1;

    print "Pour entrer un nouvel admin, veuillez entrer '".$nbr. "' dans la rubrique 'Référence'. <br><br>";

    if (isset($_GET['inserer'])) {
        extract($_GET, EXTR_OVERWRITE);
        $adm = $admin->ajoutAdmin($referenceadmin,$login,$password);

        if($adm==1){
            print "<br>L'admin a bien été ajouté !!!<br><br>";
        }else{
            print "<br>!!! Veuillez enregistrer l'admin avec un autre login !!!<br><br>";
        }
    }

    if (isset($_GET['supprimer'])) {
        extract($_GET, EXTR_OVERWRITE);
        $amd = $admin->supprimerAdmin($id_admin);
    }

    ?>

    <p>Pour la référence, si vous voulez modifier ou supprimer un admin. Entrez la référence de l'admin recherché.</p>
    <p>Si vous voulez enregistrer un nouvel admin. Entrez une référence ne se trouvant pas encore dans la base de données.</p>
    <p>Pour vous aidez à trouver la référence, une liste se trouve en bas de page !!!</p>
    <p>La suppression est une action irréversible !!!</p>
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

        <div class="col-12">
            <input type="hidden" name="id_admin" id="id_admin">
            <button type="submit" class="btn btn-primary" id="inserer" name="inserer">Enregistrer</button>
            <button type="submit" class="btn btn-primary" id="supprimer" name="supprimer">Supprimer</button>
        </div>
    </form>

    <button type="submit" class="btn btn-primary" id="editer_admin" name="editer_admin">Mettre à jour</button>

    <br>
    <br>

    <?php

    include('liste_admins.php');
}
?>