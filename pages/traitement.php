<?php 
require_once('../lib/includes.php');

//Récupération des formulaires login et password entrés par l'utilisateur
$email = htmlspecialchars($_POST['email']);
$password = htmlspecialchars($_POST['password']);

//EMAIL
//Préparation puis exécution de la requête de vérification
$req = $db->prepare('SELECT email FROM gi_user WHERE email= ?');
$req->execute(array($dbEmail)) or die('Erreur');
 
//Enregistrement de la requête
$dbEmail = $req->fetch();
 
//Fermeture de la requête afin de pas avoir de problème pour la prochaine requête
$req->closeCursor();

//MOT DE PASSE
//Préparation puis exécution de la requête de vérification
$req = $db->prepare('SELECT password FROM gi_user WHERE password = ?');
$req->execute(array($dbPassword)) or die('Erreur');
 
//Enregistrement de la requête
$dbPassword = $req->fetch();
 
//Fermeture de la requête afin de pas avoir de problème pour la prochaine requête
$req->closeCursor();
 
//Si le tableau $_POST existe alors le formulaire a été envoyé
if(!empty($_POST))
{
    //L'email est-il renseigné ?
    if(empty($email))
    {
        echo '<body onLoad = "alert(\'Veuillez indiquer votre email.\')">';
        header('Location: ../lib/login.php');
        die();
    }
    //le mot de passe est-il renseigné ?
    elseif(empty($password))
    {
        echo '<body onLoad = "alert(\'Veuillez renseigner votre mot de passe.\')">';
        header('Location: ../lib/login.php');
        die();
    }
    // Le login est-il correct ?
    elseif($email !== $dbEmail OR $password == $dbPassword)
    {
        echo '<body onLoad = "alert(\'Email non enregistré.\')">';
        die();
    }
    // Le mot de passe est-il correct ?
    elseif($password !== $dbPassword OR $email == $dbEmail)
    {
        echo '<body onLoad = "alert(\'Mot de passe erroné.\')">';
        header('Location: ../lib/login.php');
        die();
    }
    else
    {
      // On redirige vers la page connectée
        echo '<body onLoad = "alert(\'Bienvenue .\')">';
        header('Location:../lib/login.php');
        die();   
    }
}
?>

