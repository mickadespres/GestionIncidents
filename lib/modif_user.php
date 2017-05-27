<?php
include 'session.php';
include 'database.php';
include 'form.php';

if(!isset($auth)){
    if(!isset($_SESSION['Auth']['email'])){
        header('Location:../lib/login.php');
        die();
    }
}

$select = $db->query('SELECT id_user, name, firstname FROM gi_user ORDER BY name ASC');
$resolvers = $select->fetchAll();
$resolvers_list = array();
foreach($resolvers as $resolver){
    $resolvers_list[$resolver['id_user']] = $resolver['firstname'].' '.$resolver['name'];
}
require_once('../pages/header.html');
?>
<style>
    .panel-body{
        border-color:#FAFAD2;
        background:#FAFAD2;
        color:#fff; 
    }</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header" style="color:#000033;"><i class="fa fa-cog" style="font-size:38px"></i></i> Modification des informations</h1><?php echo flash();?>
    </div>
</div>
<form class="form-horizontal" role="form" action="modif_user1.php" method="GET">
    <div class="row" style="margin: 0 auto;">
        <div class="col-lg-14">
            <div class="panel panel-warning">
                <div class="panel-heading" style="color:#000033;">
                    <span class="glyphicon glyphicon-pencil"></span> Choisissez un compte utilisateur à modifier.
                </div>
                <!-- /.panel-heading-->
                <div class="panel-body">

                    <div class="container">

                        <div class="row">
                            <div class="col-md-5">
                                <div class="input-group input-group">
                                    <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-user-circle" style="font-size:20px"></i><strong> Compte de </strong></span> 
                                    <?= select('resolver',$resolvers_list);?>
                                </div><br>
                                <button type="submit" class="btn btn-warning" href="modif_user1.php?resolver=<?php= $resolvers['id_user']; ?>"><span class="glyphicon glyphicon-pencil"></span> Modifier le compte</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
</div>
