<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Casus café</title>
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
                    <li><a href="agenda.php">Agenda</a></li>
                    <li class='loginBtn'><a href="login.php">Login</a></li>
                </ul>
        </div>
    </header>
    <div class="headImg">
            <img src="img/cafe.png" alt="het café">
            <p>Home</p>
    </div>
    <div class="homeText">
        <h1>Casus Café</h1>
        <p>Welkom bij het Casus café - de plek waar muziek tot leven komt en herinneringen worden gemaakt.</p>
        <p>Stap binnen en laat je betoveren door de levendige klanken die onze muren vullen. 
        Hier bij Casuscafé geloven we in de kracht van muziek om harten te verbinden en emoties te uiten. 
        Geniet van een intieme setting waar lokale en opkomende bands het podium betreden om hun talent te laten zien. 
        Van bruisende jazz tot pakkende indie, onze muziekavonden bieden een diversiteit aan stijlen om elke muziekliefhebber te bekoren.</p>
        <p>Terwijl je geniet van de melodieën, laat je smaakpapillen verwennen door onze selectie van ambachtelijke drankjes en heerlijke hapjes. 
        Proef de passie in onze gerechten, bereid met zorg en liefde, en ontdek nieuwe favorieten terwijl je geniet van de muzikale vibes.</p>
        <p>Bij Casuscafé geloven we in het vieren van creativiteit en het ondersteunen van lokale talenten. 
        Daarom bieden we regelmatig open mic-avonden waar iedereen zijn stem kan laten horen en zijn talent kan delen. 
        Of je nu een ervaren muzikant bent of gewoon wilt genieten van een avond vol spontane optredens, bij ons is iedereen welkom.</p>
        <p>Dus kom langs en laat je meevoeren door de muzikale magie van Casuscafé. 
        Een plek waar de tijd even stilstaat en waar elke noot een verhaal vertelt.</p>
        <p>Tot ziens bij het Casus café - waar de muziek leeft en de herinneringen blijven.</p>
    </div>
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
            </ul>
        </div>
        <div>
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