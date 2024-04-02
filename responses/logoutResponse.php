<?php
session_start(); 

if (isset($_SESSION["user"])) { //checks if user is logged in
    
    $_SESSION = array(); //logs user out
    session_destroy();
    
    header('Location: ../homepage.php'); //sends user back
    exit();
}