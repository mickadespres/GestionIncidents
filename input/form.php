<?php
function input($id,$placeholder){
    $value = isset($_POST[$id]) ? $_POST[$id] : '';
    return "<input type='text' class='form-control' id='$id' name='$id' value='$value' placeholder='$placeholder' autofocus>";
}
?>