<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") { //checks if the user got here legit
    $naam = $_POST["naam"]; //conferts form data to variables
    $pwd = $_POST["pwd"];
    print_r($pwd);
    
    require_once "../inclusions/dbh.inc.php"; //connects to database

    $loginQuery = "SELECT Username, Password, Rol FROM login WHERE username = :username"; //selects the login data
    $loginStmt = $pdo->prepare($loginQuery);
    $loginStmt->execute(['username' => $naam]);

    $row = $loginStmt->fetch(PDO::FETCH_ASSOC);

 if ($row) {
    var_dump($row);
    
    if (password_verify($pwd, $row["Password"])) {
        $_SESSION["user"] = array("username" => $row["Username"], "rol" => $row["Rol"]);
        header("Location: ../homepage.php");
        exit();
    } else {
        header("Location: ../login.php?error=incorrect_password");
        exit();
    }
} else {
    header("Location: ../login.php?error=user_not_found");
    exit();
}
} else {
header("Location: ../login.php");
exit();
}