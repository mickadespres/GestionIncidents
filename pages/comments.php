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
$req = $db->query('SELECT content,name,firstname,time FROM gi_comment');
$comments = $req->fetchALL();

?>


<html>
    <body>
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

            <?php foreach($comments as $comment): ?>
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

  <div class="panel panel-info">
    <div class="panel-heading">Panel heading without title</div>
    <div class="panel-body">
      Quidem in consuetudinis suo est non cum equo quae commorati utatur quod vis quod et quae hoc hoc si si delectemur consuevit vis animal repudiandae novo in equo hoc nemo.
    </div>
  </div>

</div>

    </body>
</html>
