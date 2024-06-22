<?php
session_start();

$hashed_pw = password_hash("casuscafe", 0);
print_r($hashed_pw);
?>

<!DOCTYPE html>
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
            <p>Login</p>
    </div>
    <div class="inlog">
        <form action="responses/inlogResponse.php" method="POST">
            <div>
            <input type="text" name="naam" value="" placeholder="naam"><br>
            </div>
            <div>
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