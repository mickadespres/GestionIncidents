<?php
$auth = 0;
include '../lib/includes.php';
/**
*Traitement du formulaire
**/
if(isset($_POST['email']) && isset($_POST['password'])){
    $email = $db->quote($_POST['email']);
    $password = sha1($_POST['password']);
    $select = $db->query("SELECT * FROM gi_user WHERE email=$email AND password ='$password'");
    if($select->rowCount() > 0){
        $_SESSION['Auth']= $select->fetch();

        $prenom = $_SESSION['Auth']['firstname'];
        setFlash("Bonjour $prenom, Vous êtes maintenant bien connecté.");
        header('Location:' . WEBROOT . '../pages/cible.php');
        die();
    }
    else{
        echo "<script>alert(\"Identifiants incorrects, Veillez à bien vous identifier.\")</script>"; 
    }
}
?>
<html lang="fr">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" type="image/gif" href="../img/favicon.ico" />

        <title>Connexion au portail</title>
        <!-- Bootstrap Core CSS -->
        <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- MetisMenu CSS -->
        <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
        <!-- Custom Fonts -->
        <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <style>
            body{
                background-image: url("../img/fond.png");
                background-repeat: no-repeat;
                background-size: cover;
            }
        </style>
    </head>

    <body>
        <form action="#" method="POST">
            <!--../pages/traitement.php-->

            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        </br>
                </div>
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <style>span.glyphicon-dashboard {font-size: 8.0em;}</style>
                        <center><span class="glyphicon glyphicon-dashboard"></span></center>
                        <center><h1> Gestion Incidents </h1></center>
                        <div class="login-panel panel panel-default">
                            <div class="panel-heading">
                                <center><h3 class="panel-title">Veuillez rentrer vos informations de connexion</h3></center>
                            </div>
                            <div class="panel-body">
                                <center><?php echo notFlash('warning','Identifiants incorrects');?></center>
                                <form role="form">
                                    <fieldset>
                                        <!--<div class="form-group input-group">-->
                                        <?=classError('form-group input-group has-error has-feedback','form-group input-group');?>
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                        <?=input('email','Email'); ?>
                                        </div>
                                    <?=classError('form-group input-group has-error has-feedback','form-group input-group');?>
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                                    <input type="password" class="form-control" placeholder="Password" id="password" name="password">
                                    </div>

                                <!-- Change this to a button or input when using this as a form -->
                                <button onclick="classError();" type="submit" class="btn btn-lg btn-primary btn-outline btn-block">Se connecter</button>
                                </fieldset>
                            </form>
                    </div>
                </div>
            </div>
            </div>
        </div>
    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
    </form>

</body>
</html>