<?php
require_once('header.html');
?>


        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Création de ticket</h1>
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
                            Veuillez renseignez les champs ci-dessous
                        </div>
                        <!-- /.panel-heading-->
                        <div class="panel-body">
                              <!--  <div class="col-lg-6">-->
                                    <form role="form">
                                      <fieldset disabled>
                                          <div class="form-group">
                                              <label for="disabledSelect">Numéro demande</label>
                                              <input class="form-control" id="disabledInput" type="text" placeholder="0594563" disabled>
                                            </br>
                                          </div>
                                      </fieldset>
                                        <div class="form-group">
                                            <label>Objet</label>
                                            <input class="form-control" placeholder="Décrivez succintement votre incident">
                                            </br>
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control" rows="3"></textarea>
                                            </br>
                                        </div>
                                        <div class="form-group">
                                            <label>Catégorie(s)</label>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="choix[]" value="mat">MATERIEL
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="choix[]" value="log">LOGICIEL
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="choix[]" value="res">RESEAU
                                                </label>
                                            </div>
                                            </br>
                                          </div>
                                        <div class="form-group">
                                            <label>Priorité</label>
                                            <select class="form-control">
                                                <option value="blo">BLOQUANT</option>
                                                <option value="bas">BAS</option>
                                                <option value="mod">MODERE</option>
                                                <option value="hau">HAUT</option>
                                            </select>
                                            </br>
                                        </div>
                                        <div class="form-group">
                                            <label>Date limite de résolution</label>
                                            <select class="form-control">
                                                <option value="2j">2 JOURS</option>
                                                <option value="1s">1 SEMAINE</option>
                                                <option value="2s">2 SEMAINES</option>
                                                <option value="1m">1 MOIS</option>
                                            </select>
                                            </br>
                                        </div>
                                        <div class="form-group">
                                            <label>Localisation</label>
                                            <input class="form-control" placeholder="Entrez IP ou nom de machine">
                                            </br>
                                        </div>
                                        <div class="form-group">
                                            <label>Pièce jointe</label>
                                            <input type="file">
                                            </br>
                                        </div>
                                        <div class="form-group">
                                            <label>Commentaires</label>
                                            <textarea class="form-control" rows="3"></textarea>
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
