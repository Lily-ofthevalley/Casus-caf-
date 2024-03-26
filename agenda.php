<!DOCTYPE html>
<html>
<head>
    <title>Agenda</title>
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
                    <li><a href="agenda.php">Agenda</a></li>
                    <li class='login'><a href="login.php">Login</a></li>
                </ul>
        </div>
    </header>
    <div class="headImg">
            <img class='img' src="img/cafe.png" alt="het café">
            <p class='pageTitel'>Agenda</p>
    </div>
    <?php require_once "phpscripts/agendaphp.php" ?>
    <div class='bottomInfo'>
        <div class='openHours'>
            <ul>
                <li id='infoText'>Openingstijden</li>
                <li>Maandag: 09:00 - 17:00 uur</li>
                <li>Dinsdag: 09:00 - 17:00 uur</li>
                <li>Woensdag: 09:00 - 17:00 uur</li>
                <li>Donderdag: 09:00 - 20:00 uur</li>
                <li>Vrijdag: 09:00 - 00:00 uur</li>
                <li>Zaterdag: 12:00 - 01:00 uur</li>
                <li>Zondag: 12:00 - 01:00 uur</li>
        </div>
        <div class='adres'>
            <ul>
                <li id='infoText'>CasusCafé</li>
                <li>Jan van Galenstraat 20,</li>
                <li>1019AK Amsterdam</li>
                <li>Tel: 316-12345678</li>
        </div>
    </div>
    <footer class="flexFooter">
        <p>&copy;Casus café</p>
    </footer>
</body>
</html>