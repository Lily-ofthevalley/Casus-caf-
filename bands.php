<!DOCTYPE html>
<html>
<head>
    <title>Bands</title>
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
                    <li><a href="events.php">Agenda</a></li>
                    <li><a href="bands.php">Bands</a></li>
                    <li class='login'><a href="login.php">Login</a></li>
                </ul>
        </div>
    </header>
    <div class="addBand">
        <form action="res/addBandResponse.php" method="POST">
            <input type="text" name="bandNaam" value="" placeholder="Band naam">
            <input type="text" name="bandGenre" value="" placeholder="Band genre">
            <input type="submit" name="knop" value="voeg toe">
        </form>
    </div>
    <div class="bandTable">
        <?php
        require_once "phpscripts/dbh.php";

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
        ?>
</div>
    <footer class="flexFooter">
        <p>&copy;Casus café</p>
    </footer>
</body>
</html>