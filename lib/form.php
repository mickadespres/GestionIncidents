<?php
function input($id,$placehold){
    $value = isset($_POST[$id]) ? $_POST[$id] : '';
    return "<input type='text' class='form-control' id='$id' name='$id' value='$value' placeholder='$placehold' autofocus>";
}


function classError($error,$success){
    if(isset($_POST['email']) && isset($_POST['password']) && (!isset($_SESSION['Auth']))){
    return "<div class='$error'>";}
        else{
            return "<div class='$success'>";
        }
}


function notFlash($type,$message){
    if(isset($_POST['email']) && isset($_POST['password']) && (!isset($_SESSION['Auth'])))
     return "<div class='alert alert-$type'>$message</div>";
}

?>