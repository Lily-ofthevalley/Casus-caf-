<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") { //checks if the user got here legit
    $eventNaam = $_POST["event"]; //conferts form data to variables
    $bandNaam = $_POST["band"];

    try{
        require_once "../inclusions/dbh.inc.php"; //connects to database

        $eventQuery = "SELECT idEvent FROM Event WHERE Naam = ?"; //selects the event id
        $eventStmt = $pdo->prepare($eventQuery);
        $eventStmt->execute([$eventNaam]);
        $eventId = $eventStmt->fetchColumn();

        $bandQuery = "SELECT idBand FROM Band WHERE BandNaam = ?"; //selects the band id
        $bandStmt = $pdo->prepare($bandQuery);
        $bandStmt->execute([$bandNaam]);
        $bandId = $bandStmt->fetchColumn();

        $query = "INSERT INTO Event_has_Band (Event_idEvent, Band_idBand) VALUES (?, ?);"; //adds the band to the event
        $stmt = $pdo->prepare($query);
        $stmt->execute([$eventId, $bandId]);

        $pdo = null;
        $stmt = null;

        header("location: ../events.php"); //sends user back
        die();
    } catch (Exception $e) { //checks and gives errors
        die("Query failed" . $e->getMessage());
    }
}

else {
    header("location: ../homepage.php"); //sends user back
}