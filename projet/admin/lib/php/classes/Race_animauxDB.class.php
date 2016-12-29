<?php

class Race_animauxDB extends Race_animaux{

    private $_db;
    private $_typeArray = array();

    public function __construct($cnx) {
        $this->_db = $cnx;
    }

    public function getRaceAnimaux() {
        try {
            $query = "SELECT * FROM gt_race_animaux";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
            $data = $resultset->fetchAll();

            $resultset->execute();
        } catch (PDOException $e) {
            print $e->getMessage();
        }

        while ($data = $resultset->fetch()) {
            try {
                $_typeArray[] = new Race_animaux($data);
            } catch (PDOException $e) {
                print $e->getMessage();
            }
        }
        return $_typeArray;
    }

}
