<?php

class Vue_animauxDB {

    private $_db;
    private $_animauxArray = array();

    public function __construct($cnx) {
        $this->_db = $cnx;
    }

    public function getListeAnimaux($id) {
        try {
            $query = "SELECT * FROM vue_animaux where id_gt_race_animaux =:gt_id_race_animaux";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(1, $id);
            $resultset->execute();
            $data = $resultset->fetchAll();
        } catch (PDOException $e) {
            print $e->getMessage();
        }

        return $data;
    }
     public function getVue_gateauById($id) {
        try {
            $query = "SELECT * FROM vue_animaux where id_gt_animaux =:gt_id_animaux";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(1, $id);
            $resultset->execute();
            $data = $resultset->fetchAll();
        } catch (PDOException $e) {
            print $e->getMessage();
        }

        return $data;
    }
    public function getListeTousAnimaux() 
    {
        try 
        {
            $query = "SELECT * FROM vue_animaux";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
            $data = $resultset->fetchAll();
        } catch (PDOException $e) {
            print $e->getMessage();
        }

        return $data;
    }

}
