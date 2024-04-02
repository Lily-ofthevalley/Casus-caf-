<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") { //checks if the user got here legit
    $naam = $_POST["naam"]; //conferts form data to variables
    $pwd = $_POST["pwd"];
    
    require_once "../inclusions/dbh.inc.php"; //connects to database

    $loginQuery = "SELECT Username, Password, Rol FROM login WHERE username = :username"; //selects the login data
    $loginStmt = $pdo->prepare($loginQuery);
    $loginStmt->execute(['username' => $naam]);

    $row = $loginStmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
    
        if ($pwd == $row["Password"]) { //logs the user in if the data is correct
            $_SESSION["user"] = array("username" => $row["Username"], "rol" => $row["Rol"]);
            header("Location: ../homepage.php"); //sends user back
            exit();
        } else {
             header("Location: ../login.php"); //sends user back
             exit();
         }
     } else {
        header("Location: ../login.php"); //sends user back
         exit();
     }
 } else {
   header("Location: ../homepage.php"); //sends user back
     exit();
 }