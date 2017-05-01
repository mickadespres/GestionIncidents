<?php

if(!isset($auth)){
    if(!isset($_SESSION['Auth']['email'])){
        header('Location:' . WEBROOT . 'lib/login.php');
        die();

    }
}
?>