<?php
include '../pages/header.php';
include '../lib/database.php';
include '../lib/form.php';
if(!isset($auth)){
    if(!isset($_SESSION['Auth']['email'])){
        header('Location:../lib/login.php');
        die();
    }
}

if((empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['codePostal']) || empty($_POST['motDePasse']) || empty($_POST['email']) || empty($_POST['role'])) && isset($_POST['ajouter']))
{
    echo "<script>alert(\"Informations nécessaires pour créer le compte, vous allez être redirigé.\")</script>";
    setFlash("Aucun compte n'a été créé.","warning");
}elseif(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['codePostal']) && isset($_POST['motDePasse']) && isset($_POST['email']) && isset($_POST['role']) && isset($_POST['ajouter']))
{
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $email = htmlspecialchars($_POST['email']);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    $verif = $db->query("SELECT COUNT(*) known FROM gi_user WHERE name='$nom' AND firstname='$prenom' OR email='$email'");
    $result = $verif->fetch(PDO::FETCH_ASSOC);
    $count = $result['known'];
    function salut($verif)
    {
        if($verif != 0)
        {
            echo "<script>alert(\"Compte déjà présent, identifiants trouvés.\")</script>";
            setFlash("Le compte que vous tentez de créer existe déjà.","danger");

        }
        elseif($verif == 0)
        {
            global $db;
            $nom = htmlspecialchars($_POST['nom']);
            $prenom = htmlspecialchars($_POST['prenom']);
            $codePostal = htmlspecialchars($_POST['codePostal']);
            $password = sha1($_POST['motDePasse']);
            $email = htmlspecialchars($_POST['email']);
            $role = htmlspecialchars($_POST['role']);
            $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            $req = $db->prepare('INSERT INTO gi_user (name, firstname, postal_code, email, password, name_right) VALUES (?,?,?,?,?,?)');
            $params = array(
                $nom, 
                $prenom,
                $codePostal,
                $email,
                $password,
                $role
            );
            $req -> execute($params);
            $id = $db->LastInsertId();
            setFlash("Le compte n°$id de $prenom $nom a bien été créé !");
        }
    }
    echo salut($count);
}
?>
<style>
    .panel-body{
        border-color:#E0FFD1;
        background:#E0FFD1;
        color:#fff; 
    }</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header" style="color:#000033;"><i class="fa fa-user-plus" style="font-size:38px"></i></i> Ajout d'un utilisateur</h1>
    </div>
</div>
<?php echo flash();?>
<form class="form-horizontal" role="form" action="#" method="post">
    <div class="row" style="margin: 0 auto;">
        <div class="col-lg-14">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-info-sign"></span> Veuillez renseigner les informations du nouvel utilisateur.
                </div>
                <div class="panel-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="input-group input-group">
                                    <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-user-circle" style="font-size:20px"></i><strong> Nom</strong></span> 
                                    <input type="text" class="form-control" aria-describedby="sizing-addon1" style="font-size:16px" name="nom" placeholder="Nom de famille">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="input-group input-group">
                                    <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-user-circle-o" style="font-size:20px"></i><strong> Prénom</strong></span>
                                    <input type="text" class="form-control" aria-describedby="sizing-addon2" style="font-size:16px" name="prenom" placeholder="Prénom">
                                </div>
                            </div>
                        </div>
                        <br><br>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="input-group input-group">
                                    <span class="input-group-addon" id="sizing-addon3"><i class="fa fa-paper-plane-o" style="font-size:19px"></i><strong> Code postal</strong></span>
                                    <input type="text" class="form-control" aria-describedby="sizing-addon3" style="font-size:16px" name="codePostal" placeholder="Code postal">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="input-group input-group">
                                    <span class="input-group-addon" id="sizing-addon4"><i class="fa fa-key" style="font-size:19px"></i><strong> Mot de passe</strong></span>
                                    <input type="password" class="form-control" aria-describedby="sizing-addon4" style="font-size:16px" name="motDePasse" placeholder="Mot de passe">
                                </div>
                            </div>
                        </div>
                        <br><br>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="input-group input-group">
                                    <span class="input-group-addon" id="sizing-addon5">
                                        <i class="fa fa-at" style="font-size:20px"></i><strong> Email</strong></span>
                                    <input type="email" class="form-control" aria-describedby="sizing-addon5" style="font-size:16px" pattern="[A-Za-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" name="email" placeholder="Adresse mail">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="input-group">
                                    <span class="input-group-addon" id="sizing-addon6"><i class="fa fa-flag-o" style="font-size:20px"></i><strong> Rôle</strong></span>
                                    <select class="form-control" aria-describedby="sizing-addon6" style="font-size:16px" name="role">
                                        <option value="Administrateur">Administrateur</option>
                                        <option value="Résolveur">Résolveur</option>
                                        <option value="Utilisateur">Utilisateur</option>
                                    </select>
                                    </br>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <button class="btn btn-success" type="submit" name="ajouter" value="ajouter"><span class="glyphicon glyphicon-plus"></span><strong>  Ajouter</strong></button>
                </form>
        </div>
    </div>
    </div>
</div>
</div>
</form>
<div class='alert alert-info'><i class="fa fa-info" aria-hidden="true"></i> Note : Les rôles possibles sont "Utilisateur", "Résolveur" ou "Administrateur".</div>
</body>
</html>
