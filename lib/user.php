<?php
include 'database.php';
include '../pages/header.php';
$prenom = $_SESSION['Auth']['firstname'];
$nom = $_SESSION['Auth']['name'];
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Paramètres du compte<?php var_dump($prenom);?></h1>
        </div>
    </div>

    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <form>
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group input-group">
                            <span class="input-group-addon" id="sizing-addon1"><strong>Nom :</strong></span>
                            <input type="text" class="form-control"  placeholder="Nom" aria-describedby="sizing-addon1" value="<?= $nom; ?>" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon" id="sizing-addon2"><strong>Prénom :</strong></span>
                            <input type="text" class="form-control"  placeholder="Prénom" aria-describedby="sizing-addon2" value="<?= $prenom;?>" disabled>
                        </div>
                    </div>
                </div>
                <br><br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group input-group">
                                <span class="input-group-addon" id="sizing-addon3"><strong>Code postal :</strong></span>
                                <input type="text" class="form-control"  placeholder="Code postal" aria-describedby="sizing-addon3" disabled>
                            </div>  
                        </div>
                        <div class="col-md-6">
                            <div class="input-group input-group">
                                <span class="input-group-addon" id="sizing-addon4"><strong>Identifiant :</strong></span>
                                <input type="text" class="form-control"  placeholder="Code postal" aria-describedby="sizing-addon4" disabled>
                            </div>  
                        </div>
                    </div>
                <br><br>
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group input-group">
                            <span class="input-group-addon" id="sizing-addon5"><strong>Email :</strong></span>
                            <input type="text" class="form-control"  placeholder="Nom" aria-describedby="sizing-addon5" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon" id="sizing-addon6"><strong>Rôle :</strong></span>
                            <input type="text" class="form-control"  placeholder="Prénom" aria-describedby="sizing-addon6" disabled>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    </body>
</html>