<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $naam = $_POST["naam"];
    $datum = $_POST["datum"];
    $tijd = $_POST["tijd"];
    $prijs = $_POST["prijs"];

    try{
        require_once "../dbh.php";

        $query = "INSERT INTO event (Naam, Entree, Datum, Begintijd) VALUES (?, ?, ?, ?);";

        $stmt = $pdo ->prepare($query);

        $stmt -> execute([$naam, $prijs, $datum, $tijd]);

        $pdo = null;
        $stmt = null;

        header("location: ../events.php");

        die();
    } catch (Exception $e) {
        die("Query failed". $e->getMessage());
    }
}

else {
    header("location: ../homepage.php");
}