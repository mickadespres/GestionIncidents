<?php
include 'database.php';
include '../pages/header.php';
if(!isset($auth)){
    if(!isset($_SESSION['Auth']['email'])){
        header('Location:../lib/login.php');
        die();

    }
}
$prenom = '';
$nom = '';
$codePostal = '';
$identifiant = '';
$email = ''; 
$role = ''
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header" style="color:#000033;"><i class="fa fa-address-card-o" style="font-size:38px;"></i>  Paramètres du compte</h1>
        </div>
    </div>

    <div class="row" style="margin: 0 auto;">
        <div class="col-lg-14">
            <div class="panel panel-success">
                <div class="panel-heading" style="color:#000033;">
                    <span class="glyphicon glyphicon-info-sign"></span> Bienvenue sur votre fiche technique <?=$prenom?>, voici les informations présentes en base vous concernant.
                </div>
                <!-- /.panel-heading-->
                <div class="panel-body">

                    <div class="container">

                        <form>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="input-group input-group">
                                        <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-user-circle" style="font-size:20px"></i><strong> Nom</strong></span> 
                                        <input type="text" class="form-control" aria-describedby="sizing-addon1" style="font-size:16px" name="nom" placeholder="Nom de famille"?>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="input-group">
                                        <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-user-circle-o" style="font-size:20px"></i><strong> Prénom</strong></span>
                                        <input type="text" class="form-control" aria-describedby="sizing-addon2" style="font-size:16px" name="prenom" placeholder="Prénom"">
                                    </div>
                                </div>
                            </div>
                            <br><br>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="input-group input-group">
                                        <span class="input-group-addon" id="sizing-addon3"><i class="fa fa-paper-plane-o" style="font-size:19px"></i><strong> Code postal</strong></span>
                                        <input type="text" class="form-control" aria-describedby="sizing-addon3" style="font-size:16px" value="<?= $codePostal;?>">
                                    </div>  
                                </div>
                                <div class="col-md-5">
                                    <div class="input-group input-group">
                                        <span class="input-group-addon" id="sizing-addon4"><i class="fa fa-tag" style="font-size:19px"></i><strong>      Identifiant</strong></span>
                                        <input type="text" class="form-control" aria-describedby="sizing-addon4" style="font-size:16px" value="<?= $identifiant;?>">
                                    </div>  
                                </div>
                            </div>
                            <br><br>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="input-group input-group">
                                        <span class="input-group-addon" id="sizing-addon5">
                                            <i class="fa fa-at" style="font-size:20px"></i><strong> Email</strong></span>
                                        <input type="text" class="form-control" aria-describedby="sizing-addon5" style="font-size:16px" value="<?= $email;?>">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="input-group">
                                        <span class="input-group-addon" id="sizing-addon6"><i class="fa fa-flag-o" style="font-size:20px"></i><strong>         Rôle</strong></span>
                                        <input type="text" class="form-control" aria-describedby="sizing-addon6" style="font-size:16px" value="<?= $role;?>">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </body>
    </html>

