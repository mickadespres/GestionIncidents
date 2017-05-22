<?php
require_once('header.php');
?>

<html>
    <body>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><span class="glyphicon glyphicon-edit"></span> Nouveau ticket</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->


            <div class="row" style="margin: 0 auto;">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <span class="glyphicon glyphicon-info-sign"></span> Veuillez renseignez les champs ci-dessous
                        </div>
                        <!-- /.panel-heading-->
                        <div class="panel-body">
                              <!--  <div class="col-lg-6">-->

          <?php

              require_once('../lib/database.php');

              //Préparation puis exécution de la requête d'insertion
              $req = $db->prepare('SELECT * FROM gi_ticket;');
              $req->execute() or die('Erreur');

              //Enregistrement de la requête
              //$insertValues = $req->fetch();

              // On affiche chaque entrée une à une
              while ($data = $req->fetch())
              {

                echo $data['id_ticket'].' - ';
                echo $data['id_user'].' - ';
                echo $data['id_resolver'].' - ';
                echo $data['id_spotter'].' - ';
                echo $data['category'].' - ';
                echo $data['id_device'].' - ';
                echo $data['object'].' - ';
                echo $data['statement'].' - ';
                echo $data['description'].' - ';
                echo $data['priority'].' - ';
                echo $data['date_creation'].' - ';
                echo $data['date_resolution']."</br>";
                echo $data['note'];

              }

              //Fermeture de la requête afin de pas avoir de problème pour la prochaine requête
              $req->closeCursor();

           ?>

                                <!-- ./ col-lg-6 -->

                          </div>
                          <!-- ./ panel-body-->
                    </div>
                    <!-- /.panel panel-default-->
                </div>
                <!-- /.col-lg-12-->
            </div>
            <!-- /.row-->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->



</body>

</html>
