<?php

//$id_ticket = htmlspecialchars($_POST['id_ticket']);
$object = htmlspecialchars($_POST['object']);
$description = htmlspecialchars($_POST['description']);
$categories = htmlspecialchars($_POST['choix']);
$priority = htmlspecialchars($_POST['priority']);
$date_resolution = htmlspecialchars($_POST['date_resolution']);
$localisation = htmlspecialchars($_POST['localisation']);
$note = htmlspecialchars($_POST['note']);


//var_dump($_POST);


// Test de l'envoi du formulaire
  if(!empty($_POST))
  {
    // Les identifiants sont transmis ?
    if(!empty($object) && !empty($description) && !empty($categories) && !empty($priority) && !empty($date_resolution) && !empty($localisation))
    {

        //Préparation puis exécution de la requête d'insertion
        $req = $bdd->prepare('INSERT INTO gi_ticket(object,description,category,priority) VALUES (?,?,?,?)');
        $req->execute(array($object,$description,$categories,$priority)) or die('Erreur');

        //Enregistrement de la requête
        $insertValues = $req->fetch();

        //Fermeture de la requête afin de pas avoir de problème pour la prochaine requête
        $req->closeCursor();

         //récuypération du prénom
        //$_SESSION['firstname'] = $dbFirstnameRecup['firstname'];


        //Sujet : encodage pour un affichage correcte
        /*$subject = "Etudes statistiques : Création de votre compte validé\n";
        $subject = utf8_decode($subject);
        $subject = mb_encode_mimeheader($subject,"UTF-8");

        // Le message
        $message = "Bonjour " . $userFirstname . ",\r\n\nVous avez créé un compte sur notre site.\r\nVous avez maintenant accès à tous nos reportings et études de marché.\r\n\nVos identifiants sont : \r\nIdentifiant : " .$userEmail . "\r\nMot de passe : " . $userPassword . "\r\n\nBonne visite";

        // Dans le cas où nos lignes comportent plus de 70 caractères, nous les coupons en utilisant wordwrap()
        $message = wordwrap($message, 70, "\r\n");

        // Envoi du mail
        mail($userEmail, $subject, $message);*/


        // On redirige vers la page connecté
        header('Location: ticket_creation.php');
        exit();
    }
      else
    {
         echo '<body onLoad="alert(\'Entrez les infos obligatoires\')">';
		// puis on le redirige vers la page d'accueil
		echo '<meta http-equiv="refresh" content="0;URL=index.html">';
    }
  }
