
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
   

<?php



/*if (isset($_GET['Envoyer'])) {
    $_db = $cnx;
    $animaux = new Vue_animauxDB($cnx);
$pet = $animaux->getVue_gateauById($_GET['id_animaux']);
    $Cpseudo = $_SESSION['pseudo'];
    $Nnom = $pet[0]['nom_animaux'];
    $Nprix = $pet[0]['prix_unitaire'];
    $Nsexe = $pet[0]['sexe_animaux'];
    $Nage = $pet[0]['age_animaux'];
    $query = "insert into commande(pseudo_commande,nom_animaux,prix_unitaire,sexe_animaux,age_animaux) 
            values('" . $Cpseudo . "','" . $Nnom . "','" . $Nprix . "','" . $Nsexe . "','" . $Nage . "')";
    $resultset = $_db->prepare($query);
    $resultset->execute();
    $data = $resultset->fetchAll();

    echo "<p style='text-align: center'>commande réussie</p>";
}
?>
<?php
$animaux = new Vue_animauxDB($cnx);
$pet = $animaux->getVue_gateauById($_GET['id_animaux']);
?>

<form action="<?php print $_SERVER['PHP_SELF']; ?>" method="get" id="form_Envoyer">
    <div class="row">
        <div class="col-xs-4 col-sm-2">
            <img src="./admin/images/<?php print $pet[0]['image']; ?>" alt="Votre commande"/>
        </div>
        <div class="col-xs-8 pull-left">
            <br/><span class="txtGras">Votre commande : <span class="txtRouge"><?php print $pet[0]['nom_animaux']; ?></span></span><br/>
        </div>
    </div>
    <div class="row"><br><br>
        <div class="col-sm-2"><div class="col-sm-4"> &nbsp;&nbsp;&nbsp;
                <input type="submit" name="Envoyer" id="Envoyer" value="Envoyer" /></div></div>
</form>
<!--<div class="row"><br><br>
    <div class="col-sm-2"><div class="col-sm-4"> &nbsp;&nbsp;&nbsp;
            <input type="submit" name="Envoyer" id="Envoyer" value="retour à l'accueil" onclick="location.href='http://localhost/projet/index.php?page=accueil';" /></div></div>
-->
*/
