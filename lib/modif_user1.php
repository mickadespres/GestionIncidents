<?php
include 'database.php';
include 'form.php';
include '../pages/header.php';
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



$req = $db->prepare('SELECT id_user, name, firstname, postal_code, password, email, name_right FROM gi_user WHERE id_user = ?');
$req->execute(array($_GET['resolver']));

while ($infos = $req->fetch())
{
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
            <h1 class="page-header" style="color:#000033;"><i class="fa fa-user-plus" style="font-size:38px"></i></i> Modification des informations</h1><?= flash();?>
    </div>
</div>
<form class="form-horizontal" role="form" action="modif_user2.php" method="post">
      
    <div class="row" style="margin: 0 auto;">
        <div class="col-lg-14">
            <div class="panel panel-warning">
                <div class="panel-heading" style="color:#000033;">
                    <span class="glyphicon glyphicon-info-sign"></span> Veuillez renseigner les informations du nouvel utilisateur.
                </div>
                <!-- /.panel-heading-->
                <div class="panel-body">

                    <div class="container">
                        
                        <input type='hidden' name='id_user' value="<?php echo $infos['id_user'];?>">

                        <div class="row">
                            <div class="col-md-5">
                                <div class="input-group input-group">
                                    <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-user-circle" style="font-size:20px"></i><strong> Nom</strong></span> 
                                    <input type="text" class="form-control" aria-describedby="sizing-addon1" style="font-size:16px" name="nom" placeholder="Nom de famille" value="<?php echo $infos['name'];?>">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="input-group">
                                    <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-user-circle-o" style="font-size:20px"></i><strong> Prénom</strong></span>
                                    <input type="text" class="form-control" aria-describedby="sizing-addon2" style="font-size:16px" name="prenom" placeholder="Prénom" value="<?php echo $infos['firstname'];?>">
                                </div>
                            </div>
                        </div>
                        <br><br>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="input-group input-group">
                                    <span class="input-group-addon" id="sizing-addon3"><i class="fa fa-paper-plane-o" style="font-size:19px"></i><strong> Code postal</strong></span>
                                    <input type="text" class="form-control" aria-describedby="sizing-addon3" style="font-size:16px" name="codePostal" pattern="[0-9]{5}" placeholder="Code postal" value="<?php echo $infos['postal_code'];?>">
                                </div>  
                            </div>
                            <div class="col-md-5">
                                <div class="input-group input-group">
                                    <span class="input-group-addon" id="sizing-addon4"><i class="fa fa-key" style="font-size:19px"></i><strong> Mot de passe</strong></span>
                                    <input type="password" class="form-control" aria-describedby="sizing-addon4" style="font-size:16px" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" name="motDePasse" placeholder="Mot de passe" value="<?php echo $infos['password'];?>">
                                </div>  
                            </div>
                        </div>
                        <br><br>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="input-group input-group">
                                    <span class="input-group-addon" id="sizing-addon5">
                                        <i class="fa fa-at" style="font-size:20px"></i><strong> Email</strong></span>
                                    <input type="text" class="form-control" aria-describedby="sizing-addon5" style="font-size:16px" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" name="email" placeholder="@dresse m@il" value="<?php echo $infos['email'];?>">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="input-group">
                                    <span class="input-group-addon" id="sizing-addon6"><i class="fa fa-flag-o" style="font-size:20px"></i><strong> Rôle</strong></span>
                                    <input type="text" class="form-control" aria-describedby="sizing-addon6" style="font-size:16px" name="role" placeholder="Rôle utilisateur" value="<?php echo $infos['name_right'];?>">
                                </div>
                            </div>
                        </div>
                        <br>
                        <button class="btn btn-warning" type="submit" name="ajouter" value="ajouter"><span class="glyphicon glyphicon-pencil"></span><strong> Modifier</strong></button>
                        </form>
                </div>
            </div>
        </div>
        <?php
} 

// Fin de la boucle pour l'affichage des donnée dans la base de donnée
$req->closeCursor();


        ?>
    </div>
</form>
</body>
</html>

