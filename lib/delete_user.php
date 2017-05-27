<?php
include '../lib/session.php';
include '../lib/database.php';
include '../lib/auth.php';

if(!isset($auth)){
    if(!isset($_SESSION['Auth']['email'])){
        header('Location:../lib/login.php');
        die();
    }
}
/**
Supression
**/
if(isset($_GET['delete'])){
    checkCsrf();
    $idflash = $_GET['delete'];
    $id = $db->quote($_GET['delete']);
    $db->query("DELETE FROM gi_user WHERE id_user=$id");
    setFlash("L'utilisateur n°$idflash a bien été supprimé !");
    header('Location:delete_user.php');
    die();
}

/**
RECUPERATION USERS
**/
$select = $db->query('SELECT id_user, name, firstname, postal_code, email, name_right FROM gi_user');
$users = $select->fetchALL();

require_once('../pages/header.html');
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header" style="color:#000033;"><span class="glyphicon glyphicon-remove-sign" style="font-size:38px"></span> Suppression d'un utilisateur</h1><?php echo flash();?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-danger">
                        <div class="panel-heading"><span class="glyphicon glyphicon-info-sign"></span>
                            Choisissez un compte utilisateur à supprimer.  
                        </div>
                        <style>
                            #divConteneur{
                                min-height:475px;
                                height:475px;/*pour IE qui comprend rien, et qui ne reconnait pas min-height, mais qui comprend mal height*/
                                min-width:1030px;
                                width:1030px;/*pour IE qui comprend rien*/
                                overflow:scroll;/*pour activer les scrollbarres*/
                            }
                        </style>

                        <div id="divConteneur">
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="">
                                    <thead>
                                        <tr>
                                            <th><center>N°</center></th>
                                            <th><center>Nom</center></th>
                                            <th><center>Prénom</center></th>
                                            <th><center>Code postal</center></th>
                                            <th><center>Adresse électronique</center></th>
                                            <th><center>Droits</center></th>
                                            <th><center>Action</center></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($users as $user): ?>
                                        <tr>
                                            <td><center><?= $user['id_user']; ?></center></td>
                                            <td><center><?= $user['name']; ?></center></td>
                                            <td><center><?= $user['firstname']; ?></center></td>
                                            <td><center><?= $user['postal_code']; ?></center></td>
                                            <td><center><?= $user['email']; ?></center></td>
                                            <td><center><?= $user['name_right']; ?></center></td>
                                            <td>
                                                <center><a href="?delete=<?= $user['id_user']; ?>&<?= csrf(); ?>" onclick="return confirm('Confirmez-vous la supression en cours ?');" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i></a></center>
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
    </div>
</div>

</body>

</html>