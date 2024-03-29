<?php

if (isset($_SESSION["user"])){
    echo "<li class='loginBtn'><a href='responses/logoutResponse.php'>Logout</a></li>";
}else{
    echo "<li class='loginBtn'><a href='login.php'>Login</a></li>";
}