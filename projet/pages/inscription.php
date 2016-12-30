


<?php
if (isset($_GET['submit_compte'])) {
    extract($_GET, EXTR_OVERWRITE);
    if (trim($pseudo) != '' && trim($mdp) != '' && trim($nom) != '' && trim($prenom) != '' && trim($adresse) != '' && trim($ville) != '' && trim($pays) != '') {
        $mg2 = new creercompteManager($db);
        $retour = $mg2->addClient($_GET);
        if ($retour >= 0) {
            $texte = "<span class='txtGras'>Demande enregistrée.</span>";
            print '$texte';
        }
        if (isset($_SESSION['form'])) {
            unset($_SESSION['form']);
        }
    }
}
?>

<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <?php
            if (isset($erreur))
                print $erreur;
            ?>
        </div>
    </div>
    <form action="<?php print $_SERVER['PHP_SELF']; ?>" method="get" id="form_Envoyer">

        <div id="contenu2">

            <fieldset>
                <legend class="txtContact">S'enregistrer</legend>



                <div class="row">
                    <div class="col-sm-2"><label for="pseudo">Pseudo</label></div>
                    <div class="col-sm-4">
                        <?php if (isset($_SESSION['form']['pseudo'])) { ?>
                            <input type="text" name="pseudo" id="pseudo" value="<?php print $_SESSION['form']['pseudo']; ?>"/>
                            <?php
                        } else {
                            ?>
                            <input type="text" name="pseudo" id="pseudo" placeholder="Pseudo" required/>
                            <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2"><label for="mdp">Mot de passe</label></div>
                    <div class="col-sm-4">
                        <?php if (isset($_SESSION['form']['mdp'])) { ?>
                            <input type="password" name="mdp" id="mdp" value="<?php print $_SESSION['form']['mdp']; ?>"/>
                            <?php
                        } else {
                            ?>
                            <input type="password" name="mdp" pattern=".{3,}" title="mdp trop petit" id="mdp" placeholder="Mot de passe" required/>
                            <?php
                        }
                        ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-2"><label for="nom">Nom</label></div>
                    <div class="col-sm-4">
                        <?php if (isset($_SESSION['form']['nom'])) { ?>
                            <input type="text"  name="nom" id="nom" value="<?php print $_SESSION['form']['nom']; ?>"/>
                            <?php
                        } else {
                            ?>
                            <input type="text"  name="nom" pattern="[A-Za-z]{1,}" title="Que des lettres" id="nom" placeholder="Nom" required/>
                            <?php
                        }
                        ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-2"><label for="nom">Prenom</label></div>
                    <div class="col-sm-4">
                        <?php if (isset($_SESSION['form']['prenom'])) { ?>
                            <input type="text" name="prenom" id="prenom" value="<?php print $_SESSION['form']['prenom']; ?>"/>
                            <?php
                        } else {
                            ?>
                            <input type="text" name="prenom" pattern="[A-Za-z]{1,}" title="Que des lettres" id="prenom" placeholder="Prenom" required/>
                            <?php
                        }
                        ?></div></div>


                <div class="row">
                    <div class="col-sm-2"><label for="nom">Adresse</label></div>
                    <div class="col-sm-4">
                        <?php if (isset($_SESSION['form']['adresse'])) { ?>
                            <input type="text" name="adresse" id="adresse" value="<?php print $_SESSION['form']['adresse']; ?>"/>
                            <?php
                        } else {
                            ?>
                            <input type="text" name="adresse" id="adresse" placeholder="Adresse" required/>
                            <?php
                        }
                        ?></div></div>

                <div class="row">
                    <div class="col-sm-2"><label for="nom">Ville</label></div>
                    <div class="col-sm-4">
                        <?php if (isset($_SESSION['form']['ville'])) { ?>
                            <input type="text" name="ville" id="ville" value="<?php print $_SESSION['form']['ville']; ?>"/>
                            <?php
                        } else {
                            ?>
                            <input type="text" name="ville" id="ville" pattern="[A-Za-z]{1,}" title="Que des lettres" placeholder="Ville" required/>
                            <?php
                        }
                        ?></div></div>

                <div class="row">
                    <div class="col-sm-2"><label for="nom">Pays</label></div>
                    <div class="col-sm-4">
                        <?php if (isset($_SESSION['form']['pays'])) { ?>
                            <input type="text" name="pays" id="pays" value="<?php print $_SESSION['form']['pays']; ?>"/>
                            <?php
                        } else {
                            ?>
                            <input type="text" name="pays" pattern="[A-Za-z]{1,}" title="Que des lettres" id="pays" placeholder="Pays" required/>
                            <?php
                        }
                        ?></div></div>


                <div class="row"><br><br>
                    <div class="col-sm-2"><div class="col-sm-4"> &nbsp;&nbsp;&nbsp;
                            <input type="submit" name="Envoyer" id="Envoyer" value="Envoyer" /></div></div>
                    <div class="col-sm-2"><div class="col-sm-4"> &nbsp;&nbsp;&nbsp;
                            <input type="reset" id="reset" name="reset" value="Remise à zéro du formulaire" /></div></div>
                </div>

            </fieldset>
    </form>
</div>





<?php
$cnx = Connexion::getInstance($dsn, $user, $pass);

extract($_GET);
if (isset($_GET['Envoyer'])) {

    $_db = $cnx;

    if ($_GET['pseudo'] != "" && $_GET['mdp'] != "" && $_GET['nom'] != "" && $_GET['prenom'] != "" && $_GET['adresse'] != "" && $_GET['ville'] != "" && $_GET['pays'] != "") {// Vérif case vide
        $query = "insert into contact(pseudo_contact,mdp_contact,nom_contact,prenom_contact,adresse_contact,ville_contact,pays_contact) 
            values('" . $_GET['pseudo'] . "','" . $_GET['mdp'] . "','" . $_GET['nom'] . "','" . $_GET['prenom'] . "','" . $_GET['adresse'] . "','" . $_GET['ville'] . "','" . $_GET['pays'] . "')";
        $resultset = $_db->prepare($query);
        $resultset->execute();
        $data = $resultset->fetchAll();

       

       

        echo "Votre formulaire a bien été envoy&eacute;e.";
    } else {
        echo "votre formulaire est incomplet";
    }
}
echo".";
?>


