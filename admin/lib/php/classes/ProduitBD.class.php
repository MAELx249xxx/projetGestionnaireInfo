<?php

class ProduitBD extends Produit
{

    private $_db;
    private $_data = array();
    private $_resultset;

    public function __construct($cnx)
    {
        $this->_db = $cnx;
    }

    public function getAllProduit()
    {
        $query = "select * from vue_produits_const_cat order by id_prod";
        $_resultset = $this->_db->prepare($query);
        $_resultset->execute();

        while ($d = $_resultset->fetch()) {
            $_data[] = new Produit($d);
        }
        //var_dump($_data);

        return $_data;
    }

    public function getProduitByReference($reference)
    {
        try {
            $this->_db->beginTransaction();
            $query = "select * from pgi_produits where reference = :reference";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':reference', $reference);
            $resultset->execute();
            $data = $resultset->fetch();
            return $data;

            $this->_db->commit();
        } catch (PDOException $e) {
            print "Echec de la requête : " . $e->getMessage();
            $_db->rollback();
        }
    }

    public function getProduitById2($id_prod)
    {
        try {
            $this->_db->beginTransaction();
            $query = "select * from vue_produits_const_cat where id_prod = :id_prod";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':id_prod', $id_prod);
            $resultset->execute();
            $data = $resultset->fetch();
            return $data;


            $this->_db->commit();
        } catch (PDOException $e) {
            print "Echec de la requête : " . $e->getMessage();
            $_db->rollback();
        }
    }

    public function ajoutProduit($referenceproduit, $nom_prod, $prix, $annee_prod, $choix_categorie, $choix_constructeur)
    {
        try {
            $query = "SELECT ajout_produit(:nom_prod,:prix,:annee_prod,:id_const,:id_cat,:reference) as retour";
            $_resultset = $this->_db->prepare($query);
            $_resultset->bindValue(':nom_prod', $nom_prod);
            $_resultset->bindValue(':prix', $prix);
            $_resultset->bindValue(':annee_prod', $annee_prod);
            $_resultset->bindValue(':id_const', $choix_constructeur);
            $_resultset->bindValue(':id_cat', $choix_categorie);
            $_resultset->bindValue(':reference', $referenceproduit);
            $_resultset->execute();
            $retour = $_resultset->fetchColumn(0);

            return $retour;

        } catch (PDOException $e) {
        }
    }

    public function supprimerProduit($id_prod)
    {
        try {
            $query = "SELECT supp_produit(:id_prod) as retour";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':id_prod', $id_prod);
            $resultset->execute();

            print  "Le produit a bien été supprimé<br><br>";
        } catch (PDOException $e) {
            print  "Le produit n'a pas été supprimé<br><br>";
        }
    }

    public function majProduit($id,$nom,$prix,$annee,$id_const,$id_cat,$reference)
    {
        try {
            $query = "SELECT modif_produit(:id_prod,:nom_prod,:prix,:annee_prod,:id_const,:id_cat,:reference) as retour";
            $_resultset = $this->_db->prepare($query);
            $_resultset->bindValue(':id_prod', $id);
            $_resultset->bindValue(':nom_prod', $nom);
            $_resultset->bindValue(':prix', $prix);
            $_resultset->bindValue(':annee_prod', $annee);
            $_resultset->bindValue(':id_const', $id_const);
            $_resultset->bindValue(':id_cat', $id_cat);
            $_resultset->bindValue(':reference', $reference);
            $_resultset->execute();
            $retour = $_resultset->fetchColumn(0);
            return $retour;

        } catch (PDOException $e) {
            print "Erreur : " . $e->getMessage();
        }
    }
}