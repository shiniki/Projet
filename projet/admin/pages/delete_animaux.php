<?php 
if(!isset($_GET['id_animaux'])){
   
 }
else {
    $animaux = new Vue_animauxDB($cnx);
$pet = $animaux->getVue_gateauById($_GET['id_animaux']);}

$cnx = Connexion::getInstance($dsn, $user, $pass);
$_db=$cnx;

    
        $query = "delete from gt_animaux where id_gt_animaux = :id_gt_animaux";
        $resultset = $_db->prepare($query);
        $resultset->bindValue(':id_gt_animaux', $_GET['id_animaux']);
        $resultset->execute();
        $data = $resultset->fetch();
        header("Location: http://localhost/projet/admin/index.php?page=animaux")
          

?>
  