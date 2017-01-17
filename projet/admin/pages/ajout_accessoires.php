
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
                <legend class="txtContact">Ajouter un accessoires</legend>



                <div class="row">
                    <div class="col-sm-2"><label for="race_animaux">race de l animal</label></div>
                    <div class="col-sm-1">
                        <?php if (isset($_SESSION['form']['race_animaux'])) { ?>
                            <input type="text"  name="race_animaux" id="race_animaux" value="<?php print $_SESSION['form']['id_race_animaux']; ?>"/>
                            <?php
                        } else {
                            ?>
                            <input type="text"  name="race_animaux" id="race_animaux" placeholder="race de l animal" required/>
                            <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2"><label for="nom_accessoires">nom de l'accessoire</label></div>
                    <div class="col-sm-1">
                        <?php if (isset($_SESSION['form']['nom_accessoires'])) { ?>
                            <input type="text" name="nom_accessoires" id="nom_accessoires" value="<?php print $_SESSION['form']['nom_accessoires']; ?>"/>
                            <?php
                        } else {
                            ?>
                            <input type="text" name="nom_accessoires" pattern="[A-Za-z]{1,25}" title="Que des lettres" id="nom_animaux" placeholder="nom_accessoires" required/>
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

    if ($_GET['race_animaux'] != "" && $_GET['nom_accessoires'] != "" && $_GET['image'] != "" && $_GET['prix_unitaire'] != "" ) {// Vérif case vide
        $query="select id_gt_race_animaux from gt_race_animaux where race_animaux = :race_animaux";
        $resultset = $_db->prepare($query);
        $resultset->bindValue(':race_animaux', $_GET['race_animaux']);
        $resultset->execute();
        $data = $resultset->fetch();
        $_SESSION['race_animaux'] = $data['id_gt_race_animaux'];
        
        
        
        
        $query = "insert into gt_accessoires(id_gt_race_animaux,nom_accessoires,image,prix_unitaire) 
            values('" . $_SESSION['race_animaux'] . "','" . $_GET['nom_accessoires'] . "','" . $_GET['image'] . "','" . $_GET['prix_unitaire'] . "')";
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

        echo "<p style='text-align: center'>ajout accessoire ok</p>";
    } else {
        echo "votre formulaire est incomplet";
    }
}
echo".";
?>
        
