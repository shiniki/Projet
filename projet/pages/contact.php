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
                <legend class="txtContact">Nous contacter</legend>



                <div class="row">
                    <div class="col-sm-2"><label for="mail">votre email</label></div>
                    <div class="col-sm-1">
                        <?php if (isset($_SESSION['form']['mail'])) { ?>
                            <input type="text" name="mail" id="mail" value="<?php print $_SESSION['form']['mail']; ?>"/>
                            <?php
                        } else {
                            ?>
                            <input type="text" name="mail" id="mail" placeholder="mail" required/>
                            <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2"><label for="texte">votre texte</label></div>
                    <div class="col-sm-1">
                        <?php if (isset($_SESSION['form']['texte'])) { ?>
                            <input type="text" name="texte" id="texte" value="<?php print $_SESSION['form']['texte']; ?>"/>
                            <?php
                        } else {
                            ?>
                            <input type="text" name="texte" id="texte"   size="50" style="height:150px; "   placeholder="" required/>
                            <?php
                        }
                        ?>
                    </div>
                </div>




                <div class="row"><br><br>
                    <div class="col-sm-2"><div class="col-sm-4"> &nbsp;&nbsp;&nbsp;
                            <input type="submit" name="Envoyer" id="Envoyer" value="Envoyer" /></div></div>


            </fieldset>
    </form>
</div>



<?php
$cnx = Connexion::getInstance($dsn, $user, $pass);

extract($_GET);
if (isset($_GET['Envoyer'])) {

    $_db = $cnx;

    if ($_GET['mail'] != "" && $_GET['texte'] != "" ) {// Vérif case vide
        $query = "insert into contact3(mail_contact3,texte_contact3) 
            values('" . $_GET['mail'] . "','" . $_GET['texte'] . "')";
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