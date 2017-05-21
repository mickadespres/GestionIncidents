<?php

//APPEL CONNECTION A LA BASE DE DONNEES
require_once('../lib/database.php');

//DATE DU JOUR
$today = date("d.m.Y");

//$id_ticket = htmlspecialchars($_POST['id_ticket']);

//NUMERO APPAREIL
$id_device = htmlspecialchars($_POST['id_device']);

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
    $date_resolution = date("d-m-Y",strtotime(date("Y-m-d", strtotime($date_resolution)) . " +1 month"));
  }

//DATE DE CREATION DU JOUR
$date_creation = date("Y-m-d");


//var_dump($_POST);


// Test de l'envoi du formulaire
  if(!empty($_POST))
  {
    // Les identifiants sont transmis ?
    if(!empty($object) && !empty($description) && !empty($category) && !empty($priority) && !empty($date_resolution) && !empty($localisation))
    {

        //Préparation puis exécution de la requête d'insertion
        $req = $db->prepare('INSERT INTO gi_ticket(object,description,category,priority,id_device,statement,date_creation,date_resolution) VALUES (?,?,?,?,?,?,?,?)');
        $req->execute(array($object,$description,$category,$priority,$localisation,$statement,$date_creation,$date_resolution)) or die('Erreur');

        //Enregistrement de la requête
        $insertValues = $req->fetch();

        //Fermeture de la requête afin de pas avoir de problème pour la prochaine requête
        $req->closeCursor();


        // On redirige vers la page connecté
        header('Location: view_bdd.php');
        die();
    }
      else
    {
         echo '<body onLoad="alert(\'Entrez les infos obligatoires\')">';
		// puis on le redirige vers la page d'accueil
		echo '<meta http-equiv="refresh" content="0;URL=ticket_creation.php">';
    }
  }
