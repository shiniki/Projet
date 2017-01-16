<?php

class InfoClientDB extends InfoClient
{
    private $_db;
    private $_infoArray = array();
    
    public function __construct($cnx)
    {
        $this->_db = $cnx;
    }
   
    public function getInfoClient($page)
    {
        try
        {
            $query = "SELECT * FROM gt_texte WHERE page=:page";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(1,$page);
            $resultset->execute();
        } 
        catch (PDOException $e) 
        {
            print $e->getMessage();
        }
        while($data = $resultset->fetch())
        {
            $_infoArray[] = new InfoClient($data);
        }
       // return $_infoArray;
    }
}
  
