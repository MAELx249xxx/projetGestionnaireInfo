<?php
if (isset($_SESSION['admin'])) {

    ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            Produits
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="index_.php?page=ajout_modif_supp_produit.php">Ajout /
                                    Modification / Suppression</a></li>
                            <li><a class="dropdown-item" href="index_.php?page=liste_produits.php">Liste des
                                    produits</a></li>
                        </ul>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            Utilisateurs
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="index_.php?page=supp_utilisateur.php">Suppression</a></li>
                            <li><a class="dropdown-item" href="index_.php?page=liste_utilisateurs.php">Liste des
                                    utilisateurs</a></li>
                        </ul>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            Admins
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="index_.php?page=ajout_modif_supp_admin.php">Ajout /
                                    Modification / Suppression</a></li>
                            <li><a class="dropdown-item" href="index_.php?page=liste_admins.php">Liste des admins</a>
                            </li>
                        </ul>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            Constructeurs
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="index_.php?page=ajout_const.php">Ajout</a></li>
                            <li><a class="dropdown-item" href="index_.php?page=liste_consts.php">Liste des
                                    constructeurs</a></li>
                        </ul>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            Catégories
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="index_.php?page=ajout_cat.php">Ajout</a></li>
                            <li><a class="dropdown-item" href="index_.php?page=liste_cats.php">Liste des catégories</a>
                            </li>
                        </ul>
                </ul>
            </div>
        </div>
    </nav>

    <?php
}
?>
