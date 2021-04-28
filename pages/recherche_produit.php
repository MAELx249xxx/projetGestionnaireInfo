<p>&nbsp;</p>
<h1 class="h1">Rechercher un produit par son nom</h1>
<p>&nbsp;</p>

<?php
$prod = new ProduitBD($cnx);
$liste = $prod->getAllProduit();
$nbr = count($liste);
?>

<form action="<?php print $_SERVER['PHP_SELF']; ?>" method="get">

    &nbsp;&nbsp;
    <select name="choix_produit" id="choix_produit">
        <option value="">Choisissez</option>
        <?php
        for($i=0; $i<$nbr;$i++){
            ?>
            <option value="<?php print $liste[$i]->id_prod;?>">
                <?php print $liste[$i]->nom_prod;?>
            </option>
            <?php
        }
        ?>
    </select>
    <input type="submit" name="submit_id" value="Chercher" id="submit_id">
</form>

<div class="card-group">
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title"></h5>
            <div id="id_prod"></div>
        </div>
    </div>
</div>