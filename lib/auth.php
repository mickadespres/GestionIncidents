<?php
if(!isset($auth)){
    if(!isset($_SESSION['Auth']['email'])){
        header('Location:' . WEBROOT .'lib/login.php');
        die();

    }
}
if(!isset($_SESSION['csrf'])){
    $_SESSION['csrf'] = md5(time() + rand());
}

function csrf(){
    return 'csrf=' . $_SESSION['csrf'];
}

function checkCsrf(){
    if(!isset($_GET['csrf']) || $_GET['csrf'] != $_SESSION['csrf']){
        header('Location: csrf.php');
        die();
    }
}
?>