<?php

class ConstructeurBD extends Constructeur
{
    private $_db;
    private $_data = array();
    private $_resultset;

    public function __construct($cnx)
    {
        $this->_db = $cnx;
    }

    public function getAllConstructeur()
    {
        $query = "select * from pgi_constructeurs order by id_const";
        $_resultset = $this->_db->prepare($query);
        $_resultset->execute();

        while ($d = $_resultset->fetch()) {
            $_data[] = new  Constructeur($d);
        }
        //var_dump($_data);

        return $_data;
    }

    public function getConstructeurByReference($reference)
    {
        try {
            $this->_db->beginTransaction();
            $query = "select * from pgi_constructeurs where reference = :reference";
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

    public function ajoutConstructeur($referenceconst,$nom_const,$pays)
    {
        try {
            $query = "SELECT ajout_const(:nom_const,:pays,:reference) as retour";
            $_resultset = $this->_db->prepare($query);
            $_resultset->bindValue(':nom_const', $nom_const);
            $_resultset->bindValue(':pays', $pays);
            $_resultset->bindValue(':reference', $referenceconst);
            $_resultset->execute();
            $retour = $_resultset->fetchColumn(0);

            return $retour;

        } catch (PDOException $e) {
        }
    }
}