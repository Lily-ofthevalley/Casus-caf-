<?php

if($_POST['naam'] == 'lilith' && $_POST['pwd'] == '1234'){
    header("location: ../admin.php");
    exit;
} else{
    header("location: ../login.php");
    exit;
}