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


    public function mise_a_jourProduit($id)
    {

    }

    public function ajoutProduit()
    {

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
}