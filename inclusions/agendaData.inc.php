<div class="eventList">
        <?php
            require_once "dbh.inc.php"; //connects to the database

            try {
                $sqlEvent = "SELECT idEvent, Naam, Entree, Datum, BeginTijd FROM Event"; //Selects the event data
                $resultEvent = $pdo->query($sqlEvent);
            } catch (PDOException $e) { //checks and gives errors
                echo "Error: " . $e->getMessage();
                die();
            }

            if ($resultEvent->rowCount() > 0) { //goes through the data and place it in the right place
                while ($row = $resultEvent->fetch(PDO::FETCH_ASSOC))
                {
                    echo "<div class='event'>";
                    echo "<p class='eventName'>" . htmlspecialchars($row["Naam"], ENT_QUOTES, 'UTF-8') . "</p>";
                    echo "<div class='eventInfo'>";
                    echo "<p>Datum: " . htmlspecialchars($row["Datum"], ENT_QUOTES, 'UTF-8') . "</p>";
                    echo "<p>Aanvangstijd: " . htmlspecialchars($row["BeginTijd"], ENT_QUOTES, 'UTF-8') . "</p>";
                    echo "<p>Prijs: " . htmlspecialchars($row["Entree"], ENT_QUOTES, 'UTF-8') . " Euro</p>";
                    echo "</div>";
                    echo "<div class='bandsEvent'>";

                    try {
                        $idEvent = $row["idEvent"]; //selects all the bands associated with each event
                        $sqlBands = "SELECT BandNaam, Genre FROM Band b INNER JOIN Event_has_Band eb ON b.idBand = eb.Band_idBand WHERE eb.Event_idEvent = $idEvent";
                        $resultBands = $pdo->query($sqlBands);

                        if ($resultBands->rowCount() > 0){ //checks if there are any bands assigned to the event
                            echo "<div>";
                            echo "<p>Artiesten</p>";
                            echo "<ul>";
                            while ($bandRow = $resultBands->fetch(PDO::FETCH_ASSOC)){ //places the band names in the right place
                                echo "<li>" . htmlspecialchars($bandrow["BandNaam"], ENT_QUOTES, 'UTF-8') . "</li>";
                            }
                            echo "</ul>";
                            echo "</div>";

                            $resultBands = $pdo->query($sqlBands); //runs the query again
                            echo "<div>";
                            echo "<p>Genre</p>";
                            echo "<ul>";
                            while ($bandRow = $resultBands->fetch(PDO::FETCH_ASSOC)){ //places the band genres in the right place
                                echo "<li>" . htmlspecialchars($bandRow["Genre"], ENT_QUOTES, 'UTF-8') . "</li>";
                            }
                            echo "</ul>";
                            echo "</div>";
                        }else{
                            echo "<p>No bands scheduled for this event</p>";
                        }
                    } catch (PDOException $e) { //checks and gives errors
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