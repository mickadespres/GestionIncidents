<?php
//session_start();
include '../lib/database.php';
include '../lib/form.php';
require_once('header.php');

if(isset($_POST['object']) && isset($_POST['description']) && isset($_POST['choix']) && isset($_POST['resolveur']) && isset($_POST['priority']) && isset($_POST['date_resolution']) && isset($_POST['localisation']) && isset($_POST['note'])){
    $object = $_POST['object'];
    if(preg_match('/^[a-z\-0-9]+$/', $object)){
        $object = $db->quote($_POST['object']);
        $description = $db->quote($_POST['description']);
        $priority = $_POST['priority'];
        $localisation = $db->quote($_POST['localisation']);
        $note = $db->quote($_POST['note']);
        $statement = "ouvert";
        $idRapporteur = $id_rapporteur;
        // $db->query("INSERT INTO ticket_test SET id=$idCpt, object=$object, statement= $statement, description= $description, priority= $priority  ")
    }else{
        setFlash('l\'objet n\'est pas explicite', 'danger');
    }

}  
$select = $db->query('SELECT id_user, name, firstname FROM gi_user ORDER BY name ASC');
$resolvers = $select->fetchAll();
$resolvers_list = array();
foreach($resolvers as $resolver){
    $resolvers_list[$resolver['id_user']] = $resolver['firstname'].' '.$resolver['name'];
}

<!--$Requeteidentifiant = $db->query('SELECT id FROM ticket_test');
$identifiant = $Requeteidentifiant->fetchAll();
$identifiantList = array();
$idCpt = 1;
foreach($identifiant as $ident){
    $idCpt++;
}
?>

<?php $id_rapporteur= $_SESSION['Auth']['id_user'];
echo "(l'id rapporteur est $id_rapporteur)";?>

<html>
    <body>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><span class="glyphicon glyphicon-edit"></span> Nouveau ticket</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->


                                                <div class="row" style="margin: 0 auto;">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <span class="glyphicon glyphicon-info-sign"></span> Veuillez renseignez les champs ci-dessous 
                        </div>
                        <!-- /.panel-heading-->
                        <div class="panel-body">
                            <!--  <div class="col-lg-6">-->
                            <form action="#" method="post">
                                <fieldset disabled>
                                    <div class="form-group">
                                        <label for="disabledSelect">N° Identifiant </label>
                                        <?= inputId('id_ticket',$idCpt++,$idCpt++);?>

                                        </br>
                                    </div>
                                </fieldset>
                            <div class="form-group">
                                <label>Objet</label>
                                <?= input('Object','Décrivez succinctement votre incident');?>


                                </br>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <?= textarea('description');?>
                            </br>
                    </div>
                    <div class="form-group">
                        <label>Catégorie(s)</label>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="choix[]" value="Matériel">MATERIEL
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="choix[]" value="Logiciel">LOGICIEL
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="choix[]" value="Réseau">RESEAU
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="resolver">Technicien résolveur</label>
                        <?= select('resolver',$resolvers_list);?>
                        </br>
                </div>
                <div class="form-group">
                    <label>Priorité</label>
                    <select class="form-control" name="priority">
                        <option value="bloquant">BLOQUANT</option>
                        <option value="bas">BAS</option>
                        <option value="modéré">MODERE</option>
                        <option value="haut">HAUT</option>
                    </select>
                    </br>
            </div>
            <div class="form-group">
                <label>Date limite de résolution</label>
                <select class="form-control" name="date_resolution">
                    <option value="2jours">2 JOURS</option>
                    <option value="1semaine">1 SEMAINE</option>
                    <option value="2semaines">2 SEMAINES</option>
                    <option value="1mois">1 MOIS</option>
                </select>
                </br>
        </div>
        <div class="form-group">
            <label>Localisation</label>
            <?= input('localisation','Entrez IP ou nom de machine');?>

            </br>
        </div>
    <div class="form-group">
        <label>Pièce jointe</label>
        <input type="file">
        </br>
    </div>
<div class="form-group">
    <label>Commentaires</label>
    <?= textarea('note');?>
    </br>
</div>
<button type="submit" class="btn-outline btn-primary btn-lg btn-block">Envoyer</button>
</form>
<!--</div>-->
<!-- ./ col-lg-6 -->

</div>
<!-- ./ panel-body-->
</div>
<!-- /.panel panel-default-->
</div>
<!-- /.col-lg-12-->
</div>
<!-- /.row-->

</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->



</body>

</html>
