<?php

class AdminBD extends Admin
{
    private $_db;
    private $_data = array();
    private $_resultset;

    public function __construct($cnx)
    {
        $this->_db = $cnx;
    }

    public function getAllAdmin()
    {
        $query = "select * from pgi_admins order by id_admin";
        $_resultset = $this->_db->prepare($query);
        $_resultset->execute();

        while ($d = $_resultset->fetch()) {
            $_data[] = new  Admin($d);
        }
        //var_dump($_data);

        return $_data;
    }

    public function getAdminByReference($reference)
    {
        try {
            $this->_db->beginTransaction();
            $query = "select * from pgi_admins where reference = :reference";
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

    public function getAdmin($login, $password)
    {
        try {
            $query = "SELECT is_admin(:login,:password) as retour";
            $_resultset = $this->_db->prepare($query);
            $_resultset->bindValue(':login', $login);
            $_resultset->bindValue(':password', $password);
            $_resultset->execute();
            $retour = $_resultset->fetchColumn(0);
            return $retour;
            return $_data;
        } catch (PDOException $e) {
            print "Erreur : " . $e->getMessage();
        }
    }


    public function supprimerAdmin($id_admin)
    {
        try {

            $query = "SELECT supp_admin(:id_admin) as retour";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':id_admin', $id_admin);
            $resultset->execute();

            print  "L'admin a bien été supprimé<br><br>";
        } catch (PDOException $e) {
            print  "L'admin n'a pas été supprimé<br><br>";
        }
    }

}