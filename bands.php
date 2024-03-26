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
        <table>
            <tr class="bandTableHead">
                <td class="bandLeft">Band</td>
                <td class="bandRight">Genre</td>
            </tr>
            <?php
            require_once "phpscripts/dbh.php";

            try {
                $sql = "SELECT BandNaam, Genre FROM Band";
                $result = $pdo->query($sql);
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
                die();
            }

            if ($result->rowCount() > 0) {
                while ($row = $result->fetch(PDO::FETCH_ASSOC))
                {
                    echo "<tr>";
                    echo "<td class='bandLeft'>".$row["BandNaam"]."</td>";
                    echo "<td class='bandRight'>".$row["Genre"]."</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3'>No data found</td></tr>";
            }
            ?>
        </table>
    </div>
    <footer class="flexFooter">
        <p>&copy;Casus café</p>
    </footer>
</body>
</html>