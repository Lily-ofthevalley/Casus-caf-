<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") { //checks if the user got here legit
    $naam = $_POST["naam"]; //conferts form data to variables
    $datum = $_POST["datum"];
    $tijd = $_POST["tijd"];
    $prijs = $_POST["prijs"];

    try{
        require_once "../inclusions/dbh.inc.php"; //connects to database

        $query = "INSERT INTO event (Naam, Entree, Datum, Begintijd) VALUES (?, ?, ?, ?);"; //adds event to database
        $stmt = $pdo ->prepare($query);
        $stmt -> execute([$naam, $prijs, $datum, $tijd]);

        $pdo = null;
        $stmt = null;

        header("location: ../events.php"); //sends user back

        die();
    } catch (Exception $e) { //checks and gives errors
        die("Query failed". $e->getMessage());
    }
}

else {
    header("location: ../homepage.php"); //sends user back
}