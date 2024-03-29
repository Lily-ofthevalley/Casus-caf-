<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $naam = $_POST["naam"];
    $pwd = $_POST["pwd"];
    
    require_once "../inclusions/dbh.php";

    $loginInfoQuery = $pdo->prepare("SELECT Username, Password, Rol FROM login WHERE username = :username");
    $loginInfoQuery->execute(['username' => $naam]);

    $row = $loginInfoQuery->fetch(PDO::FETCH_ASSOC);

    if ($row) {
    
        if ($pwd == $row["Password"]) {
            $_SESSION["user"] = array("username" => $row["Username"], "rol" => $row["Rol"]);
            header("Location: ../homepage.php");
            exit();
        } else {
             header("Location: ../login.php");
             exit();
         }
     } else {
        header("Location: ../login.php");
         exit();
     }
 } else {
   header("Location: ../homepage.php");
     exit();
 }