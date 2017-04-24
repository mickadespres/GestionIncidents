<?php
session_start();
if(!isset($auth)){
    if(!isset($_SESSION['email'])){
        header('Location:' . WEBROOT . 'lib/login.php');

    }
}
?>