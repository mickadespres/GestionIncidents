<?php

include '../lib/session.php';
include '../lib/database.php';
include '../lib/auth.php';


/**
Supression
**/
if(isset($_GET['delete']) && $_SESSION['Auth']['name_right'] == "Administrateur"){
    checkCsrf();
    $idflash = $_GET['delete'];
    $id = $db->quote($_GET['delete']);
    $db->query("UPDATE gi_ticket SET statement='Fermé' WHERE id_ticket=$id");
    setFlash("Le ticket n°$idflash a bien été clôturé !");
    header('Location:../pages/listing_tickets.php');
    die();
}elseif(isset($_GET['delete']) && $_SESSION['Auth']['name_right'] != "Administrateur"){
    setFlash("Vous n'avez pas les autorisations requises pour clôre le ticket.","warning");
};

/**
Tickets
**/


$select = $db->query('SELECT id_ticket, id_user, id_resolver, category, id_device, object, statement, description, priority, date_creation, date_resolution FROM gi_ticket');
$tickets = $select->fetchALL();

require_once('header.html');

?>
<script src="//code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script src="mon_script.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
<style>
table.dataTable thead .sorting, 
table.dataTable thead .sorting_asc, 
table.dataTable thead .sorting_desc {
    background : none;
}</style>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Liste des incidents</h1><?php echo flash();?>
        </div>
        <!-- /.col-lg-12 -->
        <p><a href="../pages/ticket_creation.php" class="btn btn-success"><span class="fa fa-ticket"></span> Déclarer un nouvel incident</a></p>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Liste des incidents présents en base.
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <table width="100%" cellspacing="0" class="table table-striped table-bordered table-hover" id="example">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>Objet</th>
                                    <th>Etat</th>
                                    <th>Description</th>
                                    <th>Priorité</th>
                                    <th>Categorie</th>
                                    <th>Date de création</th>
                                    <th>Administration</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($tickets as $ticket): ?>
                                <tr>
                                    <td><center><?= $ticket['id_ticket']; ?></center></td>
                                    <td><center><?= $ticket['object']; ?></center></td>
                                    <td><center><?= $ticket['statement']; ?></center></td>
                                    <td><center><?= $ticket['description']; ?></center></td>
                                    <td><center><?= $ticket['priority']; ?></center></td>
                                    <td><?= $ticket['category']; ?></td>
                                    <td><center><?= $ticket['date_creation']; ?></center></td>
                                    <td>
                                        <?php  $id = $ticket['id_ticket']; ?>
                                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#exampleModal<?=$id?>">
                                            <i class="fa fa-comments-o" aria-hidden="true"></i>
                                        </button>

                                        <?php

    $req = $db->query("SELECT content, name, firstname, time FROM gi_comment WHERE id_ticket = '$id'");
                                                $res = $req->fetchALL();?>


                                        <!-- Modal -->
                                        <div class="modal" id="exampleModal<?=$id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel<?=$id?>" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel<?=$id?>">Commentaires</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">


                                                        <?php foreach($res as $comment): ?>
                                                        <div class="panel panel-info">
                                                            <div class="panel-heading">
                                                                <?= 'De '.$comment['firstname'].' '.$comment['name']; ?>
                                                            </div>
                                                            <div class="panel-body">
                                                                <?= $comment['content']; ?>
                                                            </div>
                                                            <div class="panel-footer">
                                                                <?= $comment['time']; ?>
                                                            </div>
                                                        </div>
                                                        <?php endforeach; ?>

                                                        <div class="form-group" action="#" role="form">
                                                            <textarea class="form-control" rows="3" placeholder="Ajoutez un commentaire" name="comment-popup"></textarea>
                                                            <?php
                                                            if (isset($_POST['comment-popup'])) {
                                                                $req = $db->prepare('INSERT INTO gi_comment(id_ticket,content,name,firstname) VALUES (?,?,?,?)');
                                                                $req->execute(array($_POST['comment-popup'])) or die('Erreur');
                                                            }
                                                            ?>
                                                        </div>


                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                                        <button type="button" class="btn btn-primary" type="submit">Valider</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <a href="../pages/ticket_reedition.php?ticket=<?= $ticket['id_ticket']; ?>" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                        <a href="?delete=<?= $ticket['id_ticket']; ?>&<?= csrf(); ?>" onclick="return confirm('Confirmez-vous la supression en cours ?');" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>