<?php
include 'session.php';
include '../pages/header.html';
include 'database.php';

if(!isset($auth)){
    if(!isset($_SESSION['Auth']['email'])){
        header('Location:../lib/login.php');
        die();
    }
}
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<html>
    <body>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" style="color:#000033;"><i class="fa fa-group" style="font-size:38px"></i> Administration</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-4">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <center><strong><i class="fa fa-lg fa-user-plus" aria-hidden="true"></i> - Ajouter un nouvel utilisateur</strong></center>
                        </div>
                        <div class="panel-body">
                            <p>Vous permet d'ajouter un nouvel utilisateur au sein de l'application. Veillez à renseigner les principales informations. </p>
                        </div>
                        <div class="panel-footer">
                            <div class="btn-group btn-group-justified">
                                <a href="../lib/ajout_user.php" class="btn btn-success">Ajouter</a></div>
                        </div>
                    </div>
                    <!-- /.col-lg-4 -->
                </div>
                <div class="col-lg-4">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <center><strong><i class="fa fa-lg fa-pencil" aria-hidden="true"></i>  - Modifier le profil d'un utilisateur</strong></center>
                        </div>
                        <div class="panel-body">
                            <p>Vous permet de modifier les paramètres du compte d'un utilisateur déclaré au sein de l'application. (Prénom, Mot de passe, Rôle,...)</p>
                        </div>
                        <div class="panel-footer">
                            <div class="btn-group btn-group-justified">
                                <a href="../lib/modif_user.php" class="btn btn-warning">Modifier</a></div>
                        </div>
                    </div>
                    <!-- /.col-lg-4 -->
                </div>
                <div class="col-lg-4">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <center><strong><i class="fa fa-lg fa-times" aria-hidden="true"></i>    - Supprimer un compte utilisateur</strong></center>
                        </div>
                        <div class="panel-body">
                            <p>Vous permet de supprimer un compte utilisateur de l'application pour que celui-ci n'ait plus d'accès.</p>
                        </div>
                        <div class="panel-footer">
                            <div class="btn-group btn-group-justified">
                                <a href="../lib/delete_user.php" class="btn btn-danger">Supprimer</a></div>
                        </div>
                    </div>
                    <!-- /.col-lg-4 -->
                </div>
            </div>
            </body>
        </html>
