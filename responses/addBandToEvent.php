<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $eventNaam = $_POST["event"];
    $bandNaam = $_POST["band"];

    try{
        require_once "../inclusions/dbh.php";

        $eventQuery = "SELECT idEvent FROM Event WHERE Naam = ?";
        $eventStmt = $pdo->prepare($eventQuery);
        $eventStmt->execute([$eventNaam]);
        $eventId = $eventStmt->fetchColumn();

        $bandQuery = "SELECT idBand FROM Band WHERE BandNaam = ?";
        $bandStmt = $pdo->prepare($bandQuery);
        $bandStmt->execute([$bandNaam]);
        $bandId = $bandStmt->fetchColumn();

        $query = "INSERT INTO Event_has_Band (Event_idEvent, Band_idBand) VALUES (?, ?);";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$eventId, $bandId]);

        $pdo = null;
        $stmt = null;

        header("location: ../events.php");
        die();
    } catch (Exception $e) {
        die("Query failed" . $e->getMessage());
    }
}

else {
    header("location: ../homepage.php");
}