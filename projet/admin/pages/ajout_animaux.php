
<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <?php
            if (isset($erreur))
                print $erreur;
            ?>
        </div>
    </div>
    <form action="<?php print $_SERVER['PHP_SELF']; ?>" method="get" id="Envoyer">

        <div id="contenu2">

            <fieldset>
                <legend class="txtContact">Ajouter un animal</legend>



                <div class="row">
                    <div class="col-sm-2"><label for="id_race_animaux">id race animaux</label></div>
                    <div class="col-sm-1">
                        <?php if (isset($_SESSION['form']['id_race_animaux'])) { ?>
                            <input type="text" name="id_race_animaux" id="id_race_animaux" value="<?php print $_SESSION['form']['id_race_animaux']; ?>"/>
                            <?php
                        } else {
                            ?>
                            <input type="text" name="id_race_animaux" id="id_race_animaux" placeholder="id_race_animaux" required/>
                            <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2"><label for="nom_animaux">nom_animaux</label></div>
                    <div class="col-sm-1">
                        <?php if (isset($_SESSION['form']['nom_animaux'])) { ?>
                            <input type="text" name="nom_animaux" id="nom_animaux" value="<?php print $_SESSION['form']['nom_animaux']; ?>"/>
                            <?php
                        } else {
                            ?>
                            <input type="text" name="nom_animaux" id="nom_animaux" placeholder="nom_animaux" required/>
                            <?php
                        }
                        ?>
                    </div>
                </div>
                
                 <div class="row">
                    <div class="col-sm-2"><label for="image">image</label></div>
                    <div class="col-sm-1">
                        <?php if (isset($_SESSION['form']['image'])) { ?>
                            <input type="text" name="image" id="image" value="<?php print $_SESSION['form']['image']; ?>"/>
                            <?php
                        } else {
                            ?>
                            <input type="text" name="image" id="image" placeholder="image" required/>
                            <?php
                        }
                        ?>
                    </div>
                </div>
                
                
                
                 <div class="row">
                    <div class="col-sm-2"><label for="prix_unitaire">prix_unitaire</label></div>
                    <div class="col-sm-1">
                        <?php if (isset($_SESSION['form']['prix_unitaire'])) { ?>
                            <input type="text" name="prix_unitaire" id="prix_unitaire" value="<?php print $_SESSION['form']['prix_unitaire']; ?>"/>
                            <?php
                        } else {
                            ?>
                            <input type="text" name="prix_unitaire" id="prix_unitaire" placeholder="prix_unitaire" required/>
                            <?php
                        }
                        ?>
                    </div>
                </div>
                
                  <div class="row">
                    <div class="col-sm-2"><label for="sexe_animaux">sexe_animaux</label></div>
                    <div class="col-sm-1">
                        <?php if (isset($_SESSION['form']['sexe_animaux'])) { ?>
                            <input type="text" name="sexe_animaux" id="sexe_animaux" value="<?php print $_SESSION['form']['sexe_animaux']; ?>"/>
                            <?php
                        } else {
                            ?>
                            <input type="text" name="sexe_animaux" id="sexe_animaux" placeholder="sexe_animaux" required/>
                            <?php
                        }
                        ?>
                    </div>
                </div>
                
                
                  <div class="row">
                    <div class="col-sm-2"><label for="age_animaux">age_animaux</label></div>
                    <div class="col-sm-1">
                        <?php if (isset($_SESSION['form']['age_animaux'])) { ?>
                            <input type="text" name="age_animaux" id="age_animaux" value="<?php print $_SESSION['form']['age_animaux']; ?>"/>
                            <?php
                        } else {
                            ?>
                            <input type="text" name="age_animaux" id="age_animaux" placeholder="age_animaux" required/>
                            <?php
                        }
                        ?>
                    </div>
                </div>
                
                




                <div class="row"><br><br>
                    <div class="col-sm-2"><div class="col-sm-4"> &nbsp;&nbsp;&nbsp;
                            <input type="submit" name="Envoyer" id="Envoyer" value="ajouter" /></div></div>
                   

                </div>

            </fieldset>
    </form>
</div>
<?php
$cnx = Connexion::getInstance($dsn, $user, $pass);

extract($_GET);
if (isset($_GET['Envoyer'])) {

    $_db = $cnx;

    if ($_GET['id_race_animaux'] != "" && $_GET['nom_animaux'] != "" && $_GET['image'] != "" && $_GET['prix_unitaire'] != "" && $_GET['sexe_animaux'] != "" && $_GET['age_animaux'] != "") {// Vérif case vide
        $query = "insert into gt_animaux(id_gt_race_animaux,nom_animaux,image,prix_unitaire,sexe_animaux,age_animaux) 
            values('" . $_GET['id_race_animaux'] . "','" . $_GET['nom_animaux'] . "','" . $_GET['image'] . "','" . $_GET['prix_unitaire'] . "','" . $_GET['sexe_animaux'] . "','" . $_GET['age_animaux'] . "')";
        $resultset = $_db->prepare($query);
        $resultset->execute();
        $data = $resultset->fetchAll();

       

        /* $req=$query('insert into contact(pseudo_contact,mdp_contact,nom_contact,prenom_contact,adresse_contact,ville_contact,pays_contact) VALUES(:pseudo_contact,:mdp_contact,:nom_contact,:prenom_contact,:adresse_contact,:ville_contact,:pays_contact)');
          $req->execute(array(
          'pseudo_contact'=>ni,
          'mdp_contact'=>aa,
          'nom_contact'=>aa,
          'prenom_contact'=>aa,
          'adresse_contact'=>aa,
          'ville_contact'=>aa,
          ' pays_contact'=>aa

          )); */

        echo "Votre formulaire a bien été envoy&eacute;e.";
    } else {
        echo "votre formulaire est incomplet";
    }
}
echo".";
?>
        
