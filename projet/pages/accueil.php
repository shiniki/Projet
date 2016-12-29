<?php
$info = new infoClientDB($cnx);
$texte = $info->getInfoClient("accueil");

?>


<div class="row">
    <div class="col-sm-8">
        <br>
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
          </ol>
          
          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">
            <div class="item active">
             
              <img src="./admin/images/gt_dia1.jpg" alt="coucou">
              <div class="carousel-caption">
                ...
              </div>
            </div>
            <div class="item">
              <img src="./admin/images/gt_birthday.jpg" alt="coucou">
              <div class="carousel-caption">
                ...
              </div>
            </div>
            <div class="item">
              <img src="./admin/images/gt_etalage.jpg" alt="coucou">
              <div class="carousel-caption">
                ...
              </div>
            </div>
            <div class="item">
              <img src="./admin/images/gt_tasse_cake.jpg" alt="coucou">
              <div class="carousel-caption">
                ...
              </div>
            </div>
            <div class="item">
              <img src="./admin/images/gt_tea_time.jpg" alt="coucou">
              <div class="carousel-caption">
                ...
              </div>
            </div>
            ...
          </div>

          <!-- Controls -->
          <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
    </div>
    <div class="col-sm-4 txtGras">
       <!-- <p><br/>
        <?php
            print utf8_encode($texte[0]->texte);
        ?>
        </p>-->
    </div>
</div>