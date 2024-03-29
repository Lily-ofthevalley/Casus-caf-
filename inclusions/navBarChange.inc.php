<?php

if (isset($_SESSION["user"]["rol"]) == "administrator"){
    echo "<li><a href='events.php'>Agenda</a></li> <br>";
    echo "<li><a href='bands.php'>Bands</a></li>";
}else{
    echo "<li><a href='agenda.php'>Agenda</a></li>";
}
    