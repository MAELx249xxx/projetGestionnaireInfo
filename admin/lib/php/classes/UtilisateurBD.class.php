<?php

class UtilisateurBD extends Utilisateur {

    private $_db;
    private $_data = array();
    private $_resultset;

    public function __construct($cnx)
    {
        $this->_db = $cnx;
    }

    public function getAllUtilisateur()
    {
        $query = "select * from pgi_utilisateurs order by id_utili";
        $_resultset = $this->_db->prepare($query);
        $_resultset->execute();

        while ($d = $_resultset->fetch()) {
            $_data[] = new Utilisateur($d);
        }
        //var_dump($_data);

        return $_data;
    }

    public function getUtilisateurByLogin($login)
    {
        try {
            $this->_db->beginTransaction();
            $query = "select * from pgi_utilisateurs where login = :login";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':login', $login);
            $resultset->execute();
            $data = $resultset->fetch();
            return $data;

            $this->_db->commit();
        } catch (PDOException $e) {
            print "Echec de la requête : " . $e->getMessage();
            $_db->rollback();
        }
    }

    public function supprimerUtilisateur($id_utili)
    {
        try {

            $query = "delete from pgi_utilisateurs where id_utili = :id_utli";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':id_utli', $id_utili);
            $resultset->execute();

            print "<br>L'utilisateur a bien été supprimé<br><br>";
        } catch (PDOException $e) {
            print "<br>L'utilisateur n'a pas été supprimé<br><br>";
        }
    }


    public function getUti($login, $password)
    {
        try {
            $query = "SELECT is_uti(:login,:password) as retour";
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

}
