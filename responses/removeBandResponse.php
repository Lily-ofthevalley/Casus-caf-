<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") { //checks if the user got here legit
    $bandNaam = $_POST["band"]; //conferts form data to variables

    try{
        require_once "../inclusions/dbh.inc.php"; //connects to database

        $bandQuery = "SELECT idBand FROM Band WHERE BandNaam = ?"; //selects the band id
        $bandStmt = $pdo->prepare($bandQuery);
        $bandStmt->execute([$bandNaam]);
        $bandId = $bandStmt->fetchColumn();

        $query = "DELETE FROM event_has_band WHERE Band_idBand = ?"; //removes the band id's connections to events
        $stmt = $pdo ->prepare($query);
        $stmt -> execute([$bandId]);

        $query = "DELETE FROM band WHERE BandNaam = ?"; //deletes band
        $stmt = $pdo ->prepare($query);
        $stmt -> execute([$bandNaam]);

        $pdo = null;
        $stmt = null;

        header("location: ../bands.php"); //sends user back

        die();
    } catch (Exception $e) { //checks and gives errors
        die("Query failed". $e->getMessage());
    }
}

else {
    header("location: ../bands.php"); //sends user back
}