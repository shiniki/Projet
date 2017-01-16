<?php 

    
 $animaux = new Vue_animauxDB($cnx);
$pet = $animaux->getVue_gateauById($_GET['id_animaux']);
$cli = new InfoClientDB($cnx);
$client = $cli->getInfoClient($_GET['id_contact']);
?>

    <div class="row">
        <div class="col-xs-4 col-sm-2">
            <img src="./admin/images/<?php print $pet[0]['image']; ?>" alt="Votre commande"/>
        </div>
        
        <div class="col-xs-8 pull-left">
            <br/><span class="txtGras">Votre commande : <span class="txtRouge"><?php print $client[0]['pseudo_contact'];?></span></span><br/>
        </div>
    
    </div>