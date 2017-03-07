<!DOCTYPE html>
<?php
	try {
      $bdd = new PDO('mysql:host=localhost;dbname=;charset=utf8','root','');
      $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch (Exception $e) {
      die('Une Erreur est survenue, impossible d&apos;atteindre la base de données :' .$e->getMessage());
	}
?>