
<html>
<head>
    <title>login</title>
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
            <p class='pageTitel'>Login</p>
    </div>
    <div class="inlog">
        <form action="res/inlogResponse.php" method="POST">
            <div class="form-group">
            <input type="text" name="naam" value="" placeholder="naam"><br>
            </div>
            <div class="form-group">
            <input type="password" name="pwd" value="" placeholder="wachtwoord"><br>
            </div>
            <input type="submit" name="knop" value="verstuur">
        </form>
    </div>
    <footer class="flexFooter">
        <p>&copy;Casus café</p>
    </footer>
</body>
</html>