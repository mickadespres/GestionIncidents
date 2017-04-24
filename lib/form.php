<?php
function input($id,$placehold){
    $value = isset($_POST[$id]) ? $_POST[$id] : '';
    return "<input type='text' class='form-control' id='$id' name='$id' value='$value' placeholder='$placehold' autofocus>";
}
?>