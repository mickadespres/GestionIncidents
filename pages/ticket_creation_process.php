<?php

//APPEL
include '../lib/form.php';
include '../lib/session.php';
require_once('../lib/database.php');

//DATE DU JOUR
$today = date("d.m.Y");

//NUMERO APPAREIL
//$id_device = htmlspecialchars($_POST['id_device']);

//OBJET
$object = htmlspecialchars($_POST['object']);

//DESCRIPTION
$description = htmlspecialchars($_POST['description']);


//CHOIX MULTIPLES CHECKBOX
foreach($_POST["choix"] as $check)
{
if( !isset($category) ){ $category = $check; }
else{ $category .= ",".$check; }
}

//TICKET A L'ETAT OUVERT
$statement = 'ouvert';

//PRIORITE DU PROBLEME
$priority = htmlspecialchars($_POST['priority']);

//IP DE L'APPAREIL
$localisation = htmlspecialchars($_POST['localisation']);

//A VOIR POUR CREER UNE AUTRE TABLE
//$note = htmlspecialchars($_POST['note']);

//TRAITEMENT DE LA DATE DE RESOLUTION DU TICKET
  $date_resolution = htmlspecialchars($_POST['date_resolution']);
      if($date_resolution == "2j"){
          $date_resolution = $today;
          $date_resolution = date("Y-m-d",strtotime(date("Y-m-d", strtotime($date_resolution)) . " +2 day"));
      }
      elseif($date_resolution == "1s"){
          $date_resolution = $today;
          $date_resolution = date("Y-m-d",strtotime(date("Y-m-d", strtotime($date_resolution)) . " +1 week"));
      }
      elseif($date_resolution == "2s"){
          $date_resolution = $today;
          $date_resolution = date("Y-m-d",strtotime(date("Y-m-d", strtotime($date_resolution)) . " +2 week"));
      }
      else{
          $date_resolution = $today;
          $date_resolution = date("Y-m-d",strtotime(date("Y-m-d", strtotime($date_resolution)) . " +1 month"));
      }

//DATE DE CREATION DU JOUR
$date_creation = date("Y-m-d");

//RESOLVEUR - RECUPERATION DE SON ID
$id_rapporteur = $_SESSION['Auth']['id_user'];

//RECUPERATION INFO UTILISATEUR
$name_user = $_SESSION['Auth']['name'];
$firstname_user = $_SESSION['Auth']['firstname'];

//COMMENTAIRE
$comment = htmlspecialchars($_POST['comment']);


// Test de l'envoi du formulaire
  if(!empty($_POST))
  {
    // Les informations principales sont-elles transmises ?
    if(!empty($object) && !empty($description) && !empty($category) && !empty($priority) && !empty($date_resolution) && !empty($localisation))
    {

        //Préparation puis exécution de la requête d'insertion
        $req = $db->prepare('INSERT INTO gi_ticket(id_user,object,description,category,priority,id_device,statement,date_creation,date_resolution) VALUES (?,?,?,?,?,?,?,?,?)');
        $req->execute(array($id_rapporteur,$object,$description,$category,$priority,$localisation,$statement,$date_creation,$date_resolution)) or die('Erreur');
        $numid=$db->lastInsertId();
        //Enregistrement de la requête
        //$insertValues = $req->fetch();

        //Fermeture de la requête afin de pas avoir de problème pour la prochaine requête
        $req->closeCursor();


        //REQUETE COMMENTAIRE
        $lastIdTicket = $db->lastInsertId();

        $req = $db->prepare('INSERT INTO gi_comment(id_ticket,content,name,firstname) VALUES (?,?,?,?)');
        $req->execute(array($lastIdTicket,$comment,$name_user,$firstname_user)) or die('Erreur');

        //Fermeture de la requête afin de pas avoir de problème pour la prochaine requête
        $req->closeCursor();
        
}
        
        // On redirige vers la page connecté
<<<<<<< HEAD
=======
//        $testid=test();
        setFlash("Le ticket n°$numid a bien été ajouté !");
>>>>>>> origin/master
        header('Location: ../lib/ticket.php');
        die();
    }
      else
    {
         echo '<body onLoad="alert(\'Entrez les infos obligatoires\')">';
      		// puis on le redirige vers la page d'accueil
      		echo '<meta http-equiv="refresh" content="0;URL=cible.php">';
    }
//function test(){
//    //RECUP ID NOUVEAU TICKET
//            $IdNouveauTicket = $db->query('SELECT id_ticket FROM gi_ticket ORDER BY id_ticket DESC LIMIT 1');
//            $identifiant = $IdNouveauTicket->fetch(PDO::FETCH_ASSOC);
//            return $idnew=$identifiant['id_ticket'];
//                
//}
