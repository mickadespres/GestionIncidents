<?php
try{
    $db = new PDO('mysql:host=localhost;dbname=gestion_incident','root','');
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    $db->exec("SET CHARACTER SET utf8");
}catch (Exception $e){
    echo 'Impossible de se connecter à la base de données';
    echo $e->getMessage();
    die();
}
