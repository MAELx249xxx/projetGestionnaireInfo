<?php

class ProduitBD extends Produit
{

    private $_db; //recevoir la valeur de $snx lors de la connexion à la BD dans index
    private $_data = array();
    private $_resultset;

    public function __construct($cnx)
    { //$cnx envoyé depuis la page qui instancie
        $this->_db = $cnx;
    }

    public function getAllProduit()
    {
        $query = "select * from vue_produits_cat order by id_cat";
        $_resultset = $this->_db->prepare($query);
        $_resultset->execute();

        while ($d = $_resultset->fetch()) {
            $_data[] = new Produit($d);
        }
        //var_dump($_data);

        return $_data;
    }

    //Spécial AJAX
    public function getProduitById2($id_produit)
    {
        try {
            $this->_db->beginTransaction();
            $query = "select * from vue_produits_cat where id_produit = :id_produit";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':id_produit', $id_produit);
            $resultset->execute();
            $data = $resultset->fetch();
            return $data;
            //renvoyer un objet nécéssite adaptation dans ajax pour retour json
            // donc retourner objet simple, qui sera stocké dans un élément de tableau json

            $this->_db->commit();
        } catch (PDOException $e) {
            print "Echec de la requête : " . $e->getMessage();
            $_db->rollback();
        }
    }

    public function getProduitsByCat($id_cat)
    {
        try {
            $query = "select * from vue_produits_cat where id_cat = :id_cat";
            $_resultset = $this->_db->prepare($query);
            $_resultset->bindValue(':id_cat', $id_cat);
            $_resultset->execute();

            while ($d = $_resultset->fetch()) {
                $_data[] = new Produit($d);
            }
            return $_data;

        } catch (PDOException $e) {
            print "Echec de la requête " . $e->getMessage();
        }
    }

}