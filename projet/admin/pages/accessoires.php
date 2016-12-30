<h2 class="txtRouge">Nos accessoires</h2>
<?php
$type = new Race_animauxDB($cnx);
$liste_t = $type->getRaceAnimaux();
$nbrT = count($liste_t);
if (isset($_GET['submit_type'])) {
    extract($_GET, EXTR_OVERWRITE);
    if ($choix_animaux != 0) {
        $liste = new Vue_accessoiresDB($cnx);
        $liste_g = $liste->getListeAccesoires($choix_animaux);
        $nbrG = count($liste_g);
    }
}
?>
<?php
if (isset($_GET['ajouter'])) {
    
    header('Location: http://localhost/projet/admin/index.php?page=ajout_accessoires');
}?>
<div class="container">
    <div class="row">
        <form action="<?php print $_SERVER['PHP_SELF']; ?>" method="get">
            <div class="col-sm-2">
                <select name="choix_animaux" id="choix_animaux">
                    <option value="1">Choisissez</option>
                    <?php                  
                    for ($i = 0; $i < $nbrT; $i++) {
                          var_dump($liste_t);
                        ?>                    
                        <option value="<?php print $liste_t[$i]->id_gt_race_animaux; ?>">
                            <?php print utf8_encode($liste_t[$i]->race_animaux); ?>
                        </option>
                        <?php
                    }
                    ?>
                </select>
                 <div class="col-sm-2"><div class="col-sm-4"> &nbsp;&nbsp;&nbsp;
                            <input type="submit" name="ajouter" id="ajouter" value="Ajouter un accessoires" />
                         
                        </div></div>

            </div>
            <div class="col-sm-1">
                <input type="submit" name="submit_type" value="Choisir" id="submit_type"/>
            </div> 
        </form>
    </div>
</div>
<br/>
<?php
if (isset($nbrG) && $nbrG > 0) {
    ?>

    <div class="container">
        <div class="row">
            <div class="col-sm-12 txtRouge txtGras txt150">
                <?php print utf8_encode($liste_g[0]['race_animaux']); ?>
            </div>
        </div>
        <?php
        for ($i = 0; $i < $nbrG; $i++) {
            ?>
            <div class="row">
                <div class="col-sm-3">
                    <img src="./images/<?php print $liste_g[$i]['image']; ?>" alt="Accessoires"/>
                </div>
                <div class="col-sm-4 txtGras">
                    <?php
                   print"nom: "; print $liste_g[$i]['nom_accessoires'] . "<br/><br/>";
                    print"prix: ";print $liste_g[$i]['prix_unitaire'] . " &euro;<br/><br/>";
              
                    ?>
                     <a class="txtBlue" href ="./index.php?id_accessoires=<?php print $liste_g[$i]['id_gt_accessoires'];?>&page=delete_accessoires">
                        Delete
                    </a>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
        <?php
    }
    ?>

