<!DOCTYPE HTML>
<?php
include('./lib/php/admin_liste_include.php');
$cnx = Connexion::getInstance($dsn, $user, $pass);
/* Index de la partie admin */
session_start();
?>
<?php
$id = (isset($_SESSION['id'])) ? (int) $_SESSION['id'] : 0;
?>
<html>

    <head>
        <title>gt_ecole</title>
        <link rel="stylesheet" type="text/css" href="./lib/css/bootstrap-3.3.7/dist/css/bootstrap.css"/>
        <link rel="stylesheet" type="text/css" href="./lib/css/gt_ecole_css.css"/>
        <script type="text/javascript" src ="./lib/js/jquery-3.1.1.js"></script>
        <script type="text/javascript" src ="./lib/css/bootstrap-3.3.7/dist/js/bootstrap.js"></script>
        <script src="./lib/js/functionsBtJquery.js"></script>
        <script src="./lib/js/functionsJquery.js"></script>
        <meta charset="UTF-8">
    </head>
    <body>
        <header>
            <div class="container">
                <img src="./images/banniere.jpg" alt="Berlioz"/>
            </div>
        </header>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav>
                        <?php
                        if ($id != 0) {
                            if (!isset($_SESSION['admin'])) {
                                if (file_exists('./lib/php/adminMenu.php')) {
                                    include('./lib/php/adminMenu.php');
                                    
                                }
                                
                            }
                        }
                          else{
                          header("Location: http://localhost/projet/index.php?page=accueil");
                              
                          }
                            ?>
                        </nav>
                    </div>
                    <div class="col-sm-10">
                        <div class="row">
                            <div class="col-sm-12"> 
                               
                            </div>
                        </div>

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
                </div>
            </div>
            <footer>

            </footer>
        </div>
    </body>
</html>
