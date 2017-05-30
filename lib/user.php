<?php
include '../lib/session.php';
include '../lib/database.php';

$prenom = $_SESSION['Auth']['firstname'];
$nom = $_SESSION['Auth']['name'];
$codePostal = $_SESSION['Auth']['postal_code'];
$identifiant = $_SESSION['Auth']['id_user'];

$email = $_SESSION['Auth']['email']; 
$role = $_SESSION['Auth']['name_right'];

$email = $_SESSION['Auth']['email'];
$role = $_SESSION['Auth']['name_right'];

include '../pages/header.html';
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header" style="color:#000033;"><i class="fa fa-address-card-o" style="font-size:38px;"></i>  Paramètres du compte</h1>
        </div>
    </div>

    <style>
        .panel-body{
            border-color:#f3ffe6;
            background:#f3ffe6;
            color:#fff; 
        }</style>
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
                                        <input type="text" class="form-control" aria-describedby="sizing-addon1" style="font-size:16px" value="<?= $nom; ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="input-group">
                                        <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-user-circle-o" style="font-size:20px"></i><strong> Prénom</strong></span>
                                        <input type="text" class="form-control" aria-describedby="sizing-addon2" style="font-size:16px" value="<?= $prenom;?>" readonly>
                                    </div>
                                </div>
                            </div>
                            <br><br>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="input-group input-group">
                                        <span class="input-group-addon" id="sizing-addon3"><i class="fa fa-paper-plane-o" style="font-size:19px"></i><strong> Code postal</strong></span>
                                        <input type="text" class="form-control" aria-describedby="sizing-addon3" style="font-size:16px" value="<?= $codePostal;?>" readonly>
                                    </div>  
                                </div>
                                <div class="col-md-5">
                                    <div class="input-group input-group">
                                        <span class="input-group-addon" id="sizing-addon4"><i class="fa fa-tag" style="font-size:19px"></i><strong> Identifiant</strong></span>
                                        <input type="text" class="form-control" aria-describedby="sizing-addon4" style="font-size:16px" value="<?= $identifiant;?>" readonly>
                                    </div>  
                                </div>
                            </div>

                            <br><br>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="input-group input-group">
                                        <span class="input-group-addon" id="sizing-addon5"><i class="fa fa-at" style="font-size:20px"></i><strong> Email</strong></span>
                                        <input type="text" class="form-control" aria-describedby="sizing-addon5" style="font-size:16px" value="<?= $email;?>" readonly>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="input-group">
                                        <span class="input-group-addon" id="sizing-addon6"><i class="fa fa-flag-o" style="font-size:20px"></i><strong> Rôle</strong></span>
                                        <input type="text" class="form-control" aria-describedby="sizing-addon6" style="font-size:16px" value="<?= $role;?>" readonly>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
</html>
