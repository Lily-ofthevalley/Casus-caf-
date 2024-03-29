<?php
session_start();

if ($_SESSION["user"]["rol"] == "administrator"){   
}else{
    header('location: homepage.php');
}
?>

<!DOCTYPE html>
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
    <header>
        <div>
            <nav>
                <ul>
                    <li><a href="homepage.php">Home</a></li>
                    <?php require_once 'inclusions/navBarChange.inc.php' ?>
                    <?php require_once 'inclusions/loginBtn.inc.php' ?>
                </ul>
        </div>
    </header>
    <div class="addEvent">
        <form action="responses/addEventResponse.php" method="POST">
            <input type="text" name="naam" value="" placeholder="Event naam">
            <input type="text" name="datum" value="" placeholder="yyyy-mm-dd">
            <input type="time" name="tijd" value="" placeholder="Aanvangsttijd">
            <input type="decimal" name="prijs" value="" placeholder="Entreeprijs">
            <input type="submit" name="knop" value="voeg toe">
        </form>
    </div>
    <div class="addBandToEvent">
        <form action="responses/addBandToEvent.php" method="POST">
            <input type="text" name="event" value="" placeholder="Event naam">
            <input type="text" name="band" value="" placeholder="Band naam">
            <input type="submit" name="knop" value="voeg toe">
        </form>
    </div>
    <?php require_once "inclusions/agendaphp.php" ?>
    <footer class="flexFooter">
        <p>&copy;Casus café</p>
    </footer>
</body>
</html>