<?php
include 'database.php';
include 'session.php';
$motDePasse = $_POST['motDePasse'];
$idUser = $_POST['id_user'];
$select = $db->query("SELECT password FROM gi_user WHERE id_user = '$idUser'");
$passwordDb = $select->Fetch();
if(
    ((isset($_POST['nom'])) && ($_POST['nom'] != "")) && ((isset($_POST['prenom'])) && ($_POST['prenom'] != "")) &&  ((isset($_POST['codePostal'])) && ($_POST['codePostal'] != "")) && ((isset($_POST['motDePasse'])) && ($_POST['motDePasse'] != "") && ($passwordDb['password'] == $motDePasse)) && ((isset($_POST['email']) && ($_POST['email'] != "")) && ((isset($_POST['role']) && ($_POST['role'] != "")))))
{

    try
    {

        $db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $req = $db->prepare("UPDATE gi_user SET id_user = :id_user, name = :nom, firstname = :firstname, postal_code = :postal_code, email = :email, name_right = :role WHERE id_user = :id_user ");

        $req->execute(array( 
            'id_user' => $_POST['id_user'],
            'nom' => $_POST['nom'],
            'firstname' => $_POST['prenom'],
            'postal_code' => $_POST['codePostal'],
            'email' => $_POST['email'],
            'role' => $_POST['role']
        ));			
    }
    catch(Exception $e)
    {
        die('Erreur:'.$e->getMessage());
    }
    $req->closeCursor();  
    $id = $_POST['id_user'];
    setFlash("Le compte n°$id a bien été modifié !");
    header('Location:../lib/modif_user.php');
    //var_dump($passwordDb);
    //var_dump($_POST['motDePasse']);
    die();

}elseif(
    ((isset($_POST['nom'])) && ($_POST['nom'] != "")) && ((isset($_POST['prenom'])) && ($_POST['prenom'] != "")) &&  ((isset($_POST['codePostal'])) && ($_POST['codePostal'] != "")) && ((isset($_POST['motDePasse'])) && ($_POST['motDePasse'] != "") && ($passwordDb['password'] != $_POST['motDePasse'])) && ((isset($_POST['email']) && ($_POST['email'] != "")) && ((isset($_POST['role']) && ($_POST['role'] != "")))))
{
    try
    {

        $db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $req = $db->prepare("UPDATE gi_user SET id_user = :id_user, name = :nom, firstname = :firstname, postal_code = :postal_code, password = :motDePasse, email = :email, name_right = :role WHERE id_user = :id_user ");

        $req->execute(array( 
            'id_user' => $_POST['id_user'],
            'nom' => $_POST['nom'],
            'firstname' => $_POST['prenom'],
            'postal_code' => $_POST['codePostal'],
            'motDePasse' => sha1($_POST['motDePasse']),
            'email' => $_POST['email'],
            'role' => $_POST['role']
        ));			
    }
    catch(Exception $e)
    {
        die('Erreur:'.$e->getMessage());
    }
    $req->closeCursor();  
    $id = $_POST['id_user'];
    setFlash("Le compte n°$id a bien été modifié !");
    //var_dump($passwordDb);
    //var_dump($_POST['motDePasse']);
    header('Location:../lib/modif_user.php');
    die();
}

else
{  	
    echo "<script>alert(\"toutes les informations sont nécessaires pour modifier le compte, vous allez être redirigé.\")</script>";
    setFlash("Aucun changement n'a été effectué","warning");
    header('Location:../lib/modif_user.php');
}
?>