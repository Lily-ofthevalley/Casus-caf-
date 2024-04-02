<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") { //checks if the user got here legit
    $naam = $_POST["bandNaam"]; //conferts form data to variables
    $genre = $_POST["bandGenre"];

    try{
        require_once "../inclusions/dbh.inc.php"; //connects to database

        $query = "INSERT INTO band (BandNaam, Genre) VALUES (?, ?);"; //adds band to database
        $stmt = $pdo ->prepare($query); 
        $stmt -> execute([$naam, $genre]);

        $pdo = null;
        $stmt = null;

        header("location: ../bands.php"); //sends user back

        die();
    } catch (Exception $e) { //checks and gives errors
        die("Query failed". $e->getMessage());
    }
}

else {
    header("location: ../homepage.php"); //sends user back
}