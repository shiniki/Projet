<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Vue_accessoiresDB
 *
 * @author shini
 */
class Vue_accessoiresDB {
   private $_db;
    private $_accesoiresArray = array();

    public function __construct($cnx) {
        $this->_db = $cnx;
    }

    public function getListeAccesoires($id) {
        try {
            $query = "SELECT * FROM vue_accessoires where id_gt_race_animaux =:gt_id_race_animaux";
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
            $query = "SELECT * FROM vue_accessoires where id_gt_accessoires =:gt_id_accessoires";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(1, $id);
            $resultset->execute();
            $data = $resultset->fetchAll();
        } catch (PDOException $e) {
            print $e->getMessage();
        }

        return $data;
    }
     public function getListeTousAccessoires() 
    {
        try 
        {
            $query = "SELECT * FROM vue_accessoires";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
            $data = $resultset->fetchAll();
        } catch (PDOException $e) {
            print $e->getMessage();
        }

        return $data;
    }
    
    
    
}
