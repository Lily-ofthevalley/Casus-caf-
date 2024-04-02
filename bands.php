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
    <title>Bands</title>
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
    <div class="addBand">
        <form action="responses/addBandResponse.php" method="POST">
            <input type="text" name="bandNaam" value="" placeholder="Band naam">
            <input type="text" name="bandGenre" value="" placeholder="Band genre">
            <input type="submit" name="knop" value="voeg toe">
        </form>
    </div>
    <div class="removeForm">
        <form action="responses/removeBandResponse.php" method="POST">
            <input type="text" name="band" value="" placeholder="Band naam">
            <input type="submit" name="knop" value="verwijder">
        </form>
    </div>
    <div class="bandTable">
        <?php require_once 'inclusions/bandList.inc.php' ?>
</div>
    <footer class="flexFooter">
        <p>&copy;Casus café</p>
    </footer>
</body>
</html>