
<?php
$animaux = new Vue_animauxDB($cnx);
$pet = $animaux->getVue_gateauById($_GET['id_animaux']);
$Cpseudo = $_SESSION['pseudo'];
$Nnom = $pet[0]['nom_animaux'];
$Nprix = $pet[0]['prix_unitaire'];
$Nsexe = $pet[0]['sexe_animaux'];
$Nage = $pet[0]['age_animaux'];


$_db = $cnx;

$query = "insert into commande(pseudo_commande,nom_animaux,prix_unitaire,sexe_animaux,age_animaux) 
            values('" . $Cpseudo . "','" . $Nnom . "','" . $Nprix . "','" . $Nsexe . "','" . $Nage . "')";
$resultset = $_db->prepare($query);
$resultset->execute();
$data = $resultset->fetchAll();

echo "<p style='text-align: center'>commande réussie</p>";
?>

<div class="row"><br><br>
    <div class="col-sm-2"><div class="col-sm-4"> &nbsp;&nbsp;&nbsp;
            <input type="submit" name="Envoyer" id="Envoyer" value="retour à l'accueil" onclick="location.href='http://localhost/projet/index.php?page=accueil';" /></div></div>
   



