<?php 
if(!isset($_GET['id_accessoires'])){
   
 }
else {
    $accessoires = new Vue_accessoiresDB($cnx);
$pet = $accessoires->getVue_gateauById($_GET['id_accessoires']);}

$cnx = Connexion::getInstance($dsn, $user, $pass);
$_db=$cnx;

    
        $query = "delete from gt_accessoires where id_gt_accessoires = :id_gt_accessoires";
        $resultset = $_db->prepare($query);
        $resultset->bindValue(':id_gt_accessoires', $_GET['id_accessoires']);
        $resultset->execute();
        $data = $resultset->fetch();
        header("Location: http://localhost/projet/admin/index.php?page=accessoires")
          

?>
  