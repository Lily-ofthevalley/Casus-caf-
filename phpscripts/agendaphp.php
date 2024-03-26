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
                    echo "<p class='eventName'>".$row["Naam"]."</p>";
                    echo "<p>".$row["Entree"]. " Euro</p>";
                    echo "</div>";
                    echo "<div class='bandList'>";
                    echo "<p>Artists</p>";

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