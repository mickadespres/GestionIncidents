<?php
require_once('header.html');
?>

<html>
    <body>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header" style="color:#000033;"><span class="glyphicon glyphicon-edit"></span> Nouveau ticket</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->


            <div class="row" style="margin: 0 auto;">
                <div class="col-lg-6">
                    <div class="panel panel-info">
                        <div class="panel-heading" style="color:#000033;">
                            <span class="glyphicon glyphicon-info-sign"></span> Veuillez renseignez les champs ci-dessous
                        </div>
                        <!-- /.panel-heading-->
                        <div class="panel-body">
                              <!--  <div class="col-lg-6">-->
                              <form role="form" action="ticket_creation_process.php" method="POST">
                                        <div class="form-group" style="color:#000033;">
                                            <label>Objet</label>

                                            <input name="object" class="form-control" placeholder="Décrivez succintement votre incident" value="test_object">

                                            </br>
                                        </div>
                                        <div class="form-group" style="color:#000033;">
                                            <label>Description</label>
                                            <textarea name="description" class="form-control" rows="3">test_description</textarea>
                                            </br>
                                        </div>
                                        <div class="form-group" style="color:#000033;">
                                            <label>Catégorie(s)</label>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="choix[]" value="Materiel">MATERIEL
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="choix[]" value="Logiciel">LOGICIEL
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="choix[]" value="Reseau">RESEAU
                                                </label>
                                            </div>
                                            </br>
                                          </div>
                                        <div class="form-group" style="color:#000033;">
                                            <label>Priorité</label>
                                            <select class="form-control" name="priority">
                                                <option value="BLOQUANT">BLOQUANT</option>
                                                <option value="BAS">BAS</option>
                                                <option value="MODERE">MODERE</option>
                                                <option value="HAUT">HAUT</option>
                                            </select>
                                            </br>
                                        </div>
                                        <div class="form-group" style="color:#000033;">
                                            <label>Date limite de résolution</label>
                                            <select class="form-control" name="date_resolution">
                                                <option value="2j">2 JOURS</option>
                                                <option value="1s">1 SEMAINE</option>
                                                <option value="2s">2 SEMAINES</option>
                                                <option value="1m">1 MOIS</option>
                                            </select>
                                            </br>
                                        </div>
                                        <div class="form-group" style="color:#000033;">
                                            <label>Localisation</label>
                                            <input name="localisation" class="form-control" placeholder="Entrez IP ou nom de machine" value="172.172.1.1">
                                            </br>
                                        </div>
                                        <div class="form-group" style="color:#000033;">
                                            <label>Pièce jointe</label>
                                            <input type="file">
                                            </br>
                                        </div>
                                        <div class="form-group" style="color:#000033;">
                                            <label>Commentaires</label>
                                            <textarea name="comment" class="form-control" rows="3"></textarea>
                                            </br>
                                        </div>
                                        <button onclick="return confirm('Confirmez-vous la création en cours ?');" type="submit" class="btn-outline btn-primary btn-lg btn-block">Ouvrir le ticket</button>
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
