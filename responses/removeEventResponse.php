<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") { //checks if the user got here legit
    $eventNaam = $_POST["event"]; //conferts form data to variables

    try{
        require_once "../inclusions/dbh.inc.php"; //connects to database

        $eventQuery = "SELECT idEvent FROM event WHERE Naam = ?"; //selects event id
        $eventStmt = $pdo->prepare($eventQuery);
        $eventStmt->execute([$eventNaam]);
        $eventId = $eventStmt->fetchColumn();

        $query = "DELETE FROM event_has_band WHERE event_idEvent = ?"; //removes all the connections the event has
        $stmt = $pdo ->prepare($query);
        $stmt -> execute([$eventId]);

        $query = "DELETE FROM event WHERE Naam = ?"; //deletes the event
        $stmt = $pdo ->prepare($query);
        $stmt -> execute([$eventNaam]);

        $pdo = null;
        $stmt = null;

        header("location: ../events.php"); //sends user back

        die();
    } catch (Exception $e) { //checks and gives errors
        die("Query failed". $e->getMessage());
    }
}

else {
    header("location: ../events.php"); //sends user back
}