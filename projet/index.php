<!DOCTYPE HTML>
<?php
include('./admin/lib/php/admin_liste_include.php');
$cnx = Connexion::getInstance($dsn, $user, $pass);
/* Index de la partie publique */
session_start();
?>
<?php
$id = (isset($_SESSION['id'])) ? (int) $_SESSION['id'] : 0;
?>
<html>

    <head>
        <title>gt_ecole</title>
        <link rel="stylesheet" type="text/css" href="./admin/lib/css/bootstrap-3.3.7/dist/css/bootstrap.css"/>
        <link rel="stylesheet" type="text/css" href="./lib/css/page_styles.css"/>

        <script src="admin/lib/js/jquery-3.1.1.js"></script>
        <script src="admin/lib/css/bootstrap-3.3.7/dist/js/bootstrap.js"></script>
        <script src="admin/lib/js/functionsBtJquery.js"></script>
        <script src="admin/lib/js/functionsJquery.js"></script>
        <meta charset='UTF-8'/>
        <meta charset="UTF-8">
    </head>
    <body>
        <header>
            <div class="container">
                <img src="./admin/images/banniere.jpg" alt="Berlioz"/>
            </div>
        </header>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav>
                        <?php
                        if ($id != 0) {
                            if (file_exists('./lib/php/gt_menu.php')) {
                                include('./lib/php/gt_menu.php');
                            }
                        } elseif (file_exists('./lib/php/gt_menu1.php')) {
                            include('./lib/php/gt_menu1.php');
                        }
                        ?>
                    </nav>
                </div>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-12"> 
                            <!--<h2 class="red">Bienvenue chez Berlioz Délices</h2>-->
                        </div>
                    </div>

                    <!--
                    1) 
                    2) Accueil :
                    -->
                    <section id="main">
                        <?php
                    if (!isset($_SESSION['page'])) {
                        $_SESSION['page'] = "accueil";
                    }
                    if (isset($_GET['page'])) {
                        $_SESSION['page'] = $_GET['page'];
                    }
                    if (file_exists('./pages/' . $_SESSION['page'] . '.php')) {
                        include ('./pages/' . $_SESSION['page'] . '.php');
                    }
                    ?>
                    </section>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">                     
                        <footer>
                            <br>
                            <br> shiniki92@gmail.com
                        </footer>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
