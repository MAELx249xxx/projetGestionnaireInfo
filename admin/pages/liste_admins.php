<?php
include('./lib/php/verifier_connexion.php');
$admin = new AdminBD($cnx);
$liste = $admin->getAllAdmin();
$nbr = count($liste);

if(isset($_SESSION['admin'])){
?>
    <p>&nbsp;</p>
    <h1 class="h1">Liste des admins</h1>
    <p>&nbsp;</p>

<table class="table">
    <thead>
    <tr>
        <th scope="col">Identifiant</th>
        <th scope="col">Login</th>
        <th scope="col">Mot de passe</th>
        <th scope="col">Numéro de référence</th>
    </tr>
    </thead>
    <tbody>

    <?php
    for ($i = 0; $i < $nbr; $i++) {


        ?>
        <tr>
            <th scope="row">
                <?php print $liste[$i]->id_admin; ?>
            </th>
            <td>
                <span name="login" id="<?php print $liste[$i]->id_admin; ?>">
                    <?php print $liste[$i]->login; ?>
                </span>
            </td>
            <td>
                <span name="password" id="<?php print $liste[$i]->id_admin; ?>">
                    <?php print $liste[$i]->password; ?>
                </span>
            </td>
            <td>
                <span name="reference" id="<?php print $liste[$i]->id_admin; ?>">
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