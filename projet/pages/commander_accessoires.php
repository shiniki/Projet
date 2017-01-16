
<?php
$animaux = new Vue_accessoiresDB($cnx);
$pet = $animaux->getVue_gateauById($_GET['id_accessoires']);
$Cpseudo = $_SESSION['pseudo'];
$Nnomacc = $pet[0]['nom_accessoires'];
$Nprixacc = $pet[0]['prix_unitaire'];



$_db = $cnx;

$query = "insert into commandeacc(pseudo_commande,nom_accessoires,prix_unitaire) 
            values('" . $Cpseudo . "','" . $Nnomacc . "','" . $Nprixacc. "')";
$resultset = $_db->prepare($query);
$resultset->execute();
$data = $resultset->fetchAll();

echo "<p style='text-align: center'>commande réussie</p>";
?>

<div class="row"><br><br>
    <div class="col-sm-2"><div class="col-sm-4"> &nbsp;&nbsp;&nbsp;
            <input type="submit" name="Envoyer" id="Envoyer" value="retour à l'accueil" onclick="location.href='http://localhost/projet/index.php?page=accueil';" /></div></div>
   



