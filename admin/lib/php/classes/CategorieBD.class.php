<?php

class CategorieBD extends Categorie
{
    private $_db;
    private $_data = array();
    private $_resultset;

    public function __construct($cnx)
    {
        $this->_db = $cnx;
    }

    public function getAllCat()
    {
        $query = "select * from pgi_categories order by id_cat";
        $_resultset = $this->_db->prepare($query);
        $_resultset->execute();

        while ($d = $_resultset->fetch()) {
            $_data[] = new  Categorie($d);
        }
        //var_dump($_data);

        return $_data;
    }

    public function getCatByReference($reference)
    {
        try {
            $this->_db->beginTransaction();
            $query = "select * from pgi_categories where reference = :reference";
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

    public function ajoutCategorie($referencecat,$nom_cat)
    {
        try {
            $query = "SELECT ajout_cat(:nom_cat,:reference) as retour";
            $_resultset = $this->_db->prepare($query);
            $_resultset->bindValue(':nom_cat', $nom_cat);
            $_resultset->bindValue(':reference', $referencecat);
            $_resultset->execute();
            $retour = $_resultset->fetchColumn(0);

            return $retour;

        } catch (PDOException $e) {
        }
    }



}