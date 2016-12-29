
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
                <legend class="txtContact">Se connecter</legend>



                <div class="row">
                    <div class="col-sm-2"><label for="pseudo">Login</label></div>
                    <div class="col-sm-1">
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
                    <div class="col-sm-1">
                        <?php if (isset($_SESSION['form']['mdp'])) { ?>
                            <input type="text" name="mdp" id="mdp" value="<?php print $_SESSION['form']['mdp']; ?>"/>
                            <?php
                        } else {
                            ?>
                            <input type="text" name="mdp" id="mdp" placeholder="Mot de passe" required/>
                            <?php
                        }
                        ?>
                    </div>
                </div>




                <div class="row"><br><br>
                    <div class="col-sm-2"><div class="col-sm-4"> &nbsp;&nbsp;&nbsp;
                            <input type="submit" name="Envoyer" id="Envoyer" value="Connexion" /></div></div>
                    <div class="bottom-left"><div class="col-sm-4">
                            <a href="http://localhost/projet/index.php?page=inscription">Pas encore inscrit ?</a></div></div>

                </div>

            </fieldset>
    </form>
</div>
<?php
$cnx = Connexion::getInstance($dsn, $user, $pass);



extract($_GET);
if (isset($_GET['Envoyer'])) {
    $message = '';
    $_db = $cnx;

    if ($_GET['pseudo'] != "" && $_GET['mdp'] != "") {// Vérif case vide
        $query = "select * from contact where pseudo_contact=:pseudo";
        $resultset = $_db->prepare($query);
        $resultset->bindValue(':pseudo', $_GET['pseudo']);
        $resultset->execute();
        $data = $resultset->fetch();

        if ($data['mdp_contact'] == ($_GET['mdp'])) { // Acces OK !
            header('Location: http://localhost/projet/index.php?page=accueil');
            $_SESSION['pseudo'] = $data['pseudo_contact'];
            //$id= $data['id_contact'];
            $_SESSION['id'] = $data['id_contact'];

          
        }
        
    } 
      if ($_GET['pseudo'] != "" && $_GET['mdp'] != "") {// Vérif case vide
        $query = "select * from admin where login_admin=:pseudo";
        $resultset = $_db->prepare($query);
        $resultset->bindValue(':pseudo', $_GET['pseudo']);
        $resultset->execute();
        $data = $resultset->fetch();

        if ($data['mdp_admin'] == ($_GET['mdp'])) { // Acces OK !
              header('Location: http://localhost/projet/admin/');
            $_SESSION['pseudo'] = $data['login_admin'];
            //$id= $data['id_contact'];
            $_SESSION['id'] = $data['id_admin'];

           
        }
        
    } 
    
    
    else {
        echo "votre formulaire est incomplet";
    }
}
echo".";
?>
        
