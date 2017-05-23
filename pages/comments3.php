<?php

//APPEL
require_once('header.php');
include '../lib/form.php';
require_once('../lib/database.php');

//DATE DU JOUR
$today = date("d.m.Y");

//RESOLVEUR - RECUPERATION DE SON ID
$id_user = $_SESSION['Auth']['id_user'];

//REQUETE COMMENTAIRE
//$req = $db->query('SELECT content,name,firstname,time FROM gi_comment com');
//$comments = $req->fetchALL();


/*$req = $db->query('SELECT content,name,firstname,time FROM gi_comment com, gi_ticket ti WHERE com.id_ticket = ti.id_ticket AND com.id_ticket = .$ticket['id_ticket']');
$comments = $req->fetchALL();*/

?>

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><span class="glyphicon glyphicon-edit"></span>Commentaires</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->


<?php

$id = 23;

$req = $db->query("SELECT content,name,firstname,time FROM gi_comment WHERE id_ticket = '$id'");
$res = $req->fetchALL();

//Enregistrement de la requête
//$res = $req->fetch();

//Fermeture de la requête afin de pas avoir de problème pour la prochaine requête
//$req->closeCursor();

?>

            <?php foreach($res as $comment): ?>
            <div class="panel panel-info">
                <div class="panel-heading">
                  <?= 'M. '.$comment['firstname'].' '.$comment['name']; ?>
                  </div>
                  <div class="panel-body">
                <?= $comment['content']; ?>
              </div>
              <div class="panel-footer">
                <?= $comment['time']; ?>
                </div>
            </div>
            <?php endforeach; ?>

            <?php
            //Fermeture de la requête afin de pas avoir de problème pour la prochaine requête
            $req->closeCursor();
            ?>

  <div class="panel panel-info">
    <div class="panel-heading">Panel heading without title</div>
    <div class="panel-body">
      Quidem in consuetudinis suo est non cum equo quae commorati utatur quod vis quod et quae hoc hoc si si delectemur consuevit vis animal repudiandae novo in equo hoc nemo.
    </div>
  </div>

</div>

    </body>
</html>
