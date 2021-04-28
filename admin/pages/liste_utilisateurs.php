<?php
include('./lib/php/verifier_connexion.php');
$utilisateur = new UtilisateurBD($cnx);
$liste = $utilisateur->getAllUtilisateur();
$nbr = count($liste);

if(isset($_SESSION['admin'])){
?>
    <p>&nbsp;</p>
    <h1 class="h1">Liste des utilisateurs</h1>
    <p>&nbsp;</p>

<table class="table">
    <thead>
    <tr>
        <th scope="col">Identifiant</th>
        <th scope="col">Nom</th>
        <th scope="col">Prénom</th>
        <th scope="col">Login</th>
        <th scope="col">Mot de passe</th>
        <th scope="col">Rue</th>
        <th scope="col">Numéro</th>
        <th scope="col">Pays</th>
        <th scope="col">Ville</th>
        <th scope="col">Numéro de référence</th>
    </tr>
    </thead>
    <tbody>

    <?php
    for ($i = 0; $i < $nbr; $i++) {


        ?>
        <tr>
            <th scope="row">
                <?php print $liste[$i]->id_utili; ?>
            </th>
            <td>
                <span name="nom_utili" id="<?php print $liste[$i]->id_utili; ?>">
                    <?php print $liste[$i]->nom_utili; ?>
                </span>
            </td>
            <td>
                <span name="prenom" id="<?php print $liste[$i]->id_utili; ?>">
                    <?php print $liste[$i]->prenom; ?>
                </span>
            </td>
            <td>
                <span name="login" id="<?php print $liste[$i]->id_utili; ?>">
                    <?php print $liste[$i]->login; ?>
                </span>
            </td>
            <td>
                <span name="password" id="<?php print $liste[$i]->id_utili; ?>">
                    <?php print $liste[$i]->password; ?>
                </span>
            </td>
            <td>
                <span name="rue" id="<?php print $liste[$i]->id_utili; ?>">
                    <?php print $liste[$i]->rue; ?>
                </span>
            </td>
            <td>
                <span name="num" id="<?php print $liste[$i]->id_utili; ?>">
                    <?php print $liste[$i]->num; ?>
                </span>
            </td>
            <td>
                <span name="pays" id="<?php print $liste[$i]->id_utili; ?>">
                    <?php print $liste[$i]->pays; ?>
                </span>
            </td>
            <td>
                <span name="ville" id="<?php print $liste[$i]->id_utili; ?>">
                    <?php print $liste[$i]->ville; ?>
                </span>
            </td>
            <td>
                <span name="reference" id="<?php print $liste[$i]->id_utili; ?>">
                    <?php print $liste[$i]->reference; ?>
                </span>
            </td>
        </tr>

        <?php
    }
    ?>

    </tbody>
</table>

    <?php
    }
        ?>