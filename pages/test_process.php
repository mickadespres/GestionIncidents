<?php

//$id_ticket = htmlspecialchars($_POST['id_ticket']);
$object = htmlspecialchars($_POST['object']);
$description = htmlspecialchars($_POST['description']);
$categories = htmlspecialchars($_POST['choix']);
$priority = htmlspecialchars($_POST['priority']);
$date_resolution = htmlspecialchars($_POST['date_resolution']);
$localisation = htmlspecialchars($_POST['localisation']);
$note = htmlspecialchars($_POST['note']);

echo 'plouf';


var_dump($_POST);

?>
