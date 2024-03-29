<?php

        require_once "inclusions/dbh.php";

        try {
                $sql = "SELECT BandNaam, Genre FROM Band";
                $result = $pdo->query($sql);
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
                die();
            }
    
        echo "<div class='list'>";
        echo"<p class='hlist'>Band</p>";
        echo "<ul class='bandList'>";
            if ($result->rowCount() > 0) {
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo "<li>" . $row["BandNaam"] . "</li>";
                }
            } else {
            echo "<p>No data found</p>";
            }
            echo "</ul>";
            echo "</div>";

            $result->execute();

            echo "<div class='list'>";
            echo "<p class='hlist'>Genre</p>";
            echo "<ul class='bandList'>";
            if ($result->rowCount() > 0) {
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo "<li>" . $row["Genre"] . "</li>";
            }
        } else {
            echo "<p>No data found</p>";
        }
        echo "</ul>";
        echo "</div>";