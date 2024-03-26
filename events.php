<?php

?>

<html>
<head>
    <title>Events</title>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/x-icon" href="img/favicon.ico" />
    <meta name="author" content="Lilith" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="style/style.css" />
</head>
<body>
    <header class="flexHeader">
        <div>
            <nav class="navBar">
                <ul>
                    <li><a href="homepage.php">Home</a></li>
                    <li><a href="events.php">Events</a></li>
                    <li><a href="bands.php">Bands</a></li>
                </ul>
        </div>
    </header>
    <div class="addEvent">
        <form action="res/addEventResponse.php" method="POST">
            <input type="text" name="naam" value="" placeholder="Event naam">
            <input type="text" name="datum" value="" placeholder="yyyy-mm-dd">
            <input type="time" name="tijd" value="" placeholder="Aanvangsttijd">
            <input type="decimal" name="prijs" value="" placeholder="Entreeprijs">
            <input type="submit" name="knop" value="voeg toe">
        </form>
    </div>
    <div class="addBandToEvent">
        <form action="res/addBandToEvent.php" method="POST">
            <input type="text" name="event" value="" placeholder="Event naam">
            <input type="text" name="band" value="" placeholder="Band naam">
            <input type="submit" name="knop" value="voeg toe">
        </form>
    </div>
        <div class="eventList">
        <?php
            require_once "dbh.php";

            try {
                $sqlEvent = "SELECT idEvent, Naam, Entree, Datum, BeginTijd FROM Event";
                $resultEvent = $pdo->query($sqlEvent);
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
                die();
            }

            if ($resultEvent->rowCount() > 0) {
                while ($row = $resultEvent->fetch(PDO::FETCH_ASSOC))
                {
                    echo "<div class='event'>";
                    echo "<div class='eventInfo'>";
                    echo "<p>".$row["Datum"].' '.$row["BeginTijd"]."</p>";
                    echo "<p>".$row["Naam"]."</p>";
                    echo "<p>".$row["Entree"]. " Euro</p>";
                    echo "</div>";
                    echo "<div class='bandList'>";

                    try {
                        $idEvent = $row["idEvent"];
                        $sqlBands = "SELECT BandNaam, Genre FROM Band b INNER JOIN Event_has_Band eb ON b.idBand = eb.Band_idBand WHERE eb.Event_idEvent = $idEvent";
                        $resultBands = $pdo->query($sqlBands);

                        if ($resultBands->rowCount() > 0){
                            echo "<ul>";
                            while ($bandRow = $resultBands->fetch(PDO::FETCH_ASSOC)){
                                echo "<li>".$bandRow["BandNaam"].' '.$bandRow["Genre"]."</li>";
                            }
                            echo "</ul>";
                        }else{
                            echo "<p>No bands scheduled for this event</p>";
                        }
                    } catch (PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }
                        
                    echo "</div>";
                    echo "</div>";
                }
            } else {
                echo "<p>No data found</p>";
            }
            ?>
        </div>
    <footer class="flexFooter">
        <p>&copy;Casus café</p>
    </footer>
</body>
</html>