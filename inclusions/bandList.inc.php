<?php

        require_once "dbh.inc.php"; //connects to the database

        try {
                $sql = "SELECT BandNaam, Genre FROM Band"; //selects the band data
                $result = $pdo->query($sql);
            } catch (PDOException $e) { //checks and gives errors
                echo "Error: " . $e->getMessage();
                die();
            }
    
        echo "<div class='list'>";
        echo"<p class='hlist'>Band</p>";
        echo "<ul class='bandList'>";
            if ($result->rowCount() > 0) { //checks if there are bands
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) { //places the band names in the right place
                echo "<li>" . htmlspecialchars($row["BandNaam"], ENT_QUOTES, 'UTF-8') . "</li>";
                }
            } else {
            echo "<p>No data found</p>";
            }
            echo "</ul>";
            echo "</div>";

            $result->execute(); //runs the query again

            echo "<div class='list'>";
            echo "<p class='hlist'>Genre</p>";
            echo "<ul class='bandList'>";
            if ($result->rowCount() > 0) { //checks if there are genres
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) { //places the genres in the right place
                echo "<li>" . htmlspecialchars($row["Genre"], ENT_QUOTES, 'UTF-8') . "</li>";
            }
        } else {
            echo "<p>No data found</p>";
        }
        echo "</ul>";
        echo "</div>";