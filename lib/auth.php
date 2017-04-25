<?php

if(!isset($auth)){
    if(!isset($_SESSION['email'])){
        header('Location:' . WEBROOT . 'lib/login.php');
        die();

    }
}
?>