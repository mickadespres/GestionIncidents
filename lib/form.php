<?php
function input($id,$placehold){
    $value = isset($_POST[$id]) ? $_POST[$id] : '';
    return "<input type='text' class='form-control' id='$id' name='$id' value='$value' placeholder='$placehold' autofocus>";
}

function inputId($id,$placehold,$value){
    return "<input type='text' class='form-control' id='$id' name='$id' value='$value' placeholder='$placehold' disabled>";

}

function textarea($id){
    $value = isset($_POST[$id]) ? $_POST[$id] : '';
    return "<textarea type='text' class='form-control' id='$id' name ='$id' rows='3'>$value</textarea>";
}

function select($id, $options = array()){
    $return = "<select class='form-control' id='$id' name='$id'>";
    foreach($options as $k => $v){
        $selected = '';
        if(isset($_POST[$id]) && $k == $_POST[$id]){
            $selected = ' selected="selected"';
        }
        $return .= "<option value='$k' $selected>$v</option>";
    }
    $return .= '</select>';
    return $return; 
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