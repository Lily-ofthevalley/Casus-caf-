<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $naam = $_POST["bandNaam"];
    $genre = $_POST["bandGenre"];

    try{
        require_once "../dbh.php";

        $query = "INSERT INTO band (BandNaam, Genre) VALUES (?, ?);";

        $stmt = $pdo ->prepare($query);

        $stmt -> execute([$naam, $genre]);

        $pdo = null;
        $stmt = null;

        header("location: ../bands.php");

        die();
    } catch (Exception $e) {
        die("Query failed". $e->getMessage());
    }
}

else {
    header("location: ../homepage.php");
}