<?php

session_start();

if(isset($_SESSION["id"])) {
    header("Location: http://localhost/dvorane");
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <title>Login</title>
</head>
<body>

    <div class="login">
        <form name="form1" action="/login-handler" method="GET">
            <p class="form-label left-neg">E-mail</p>
            <input class="left-neg form-input" type="email" name="email" id="email">
            <?php
                if(isset($_GET['user'])) {
                    if ($_GET["user"] == 1){
                        echo("<p style='color:red;'><i>Wrong Username!!!!</i></p>");
                    }
                }
                
            ?>
            <p class="form-label left-neg">Password</p>
            <input class="left-neg form-input" type="password" name="password" id="password">
            <?php
                if(isset($_GET['pass'])) {
                    if ($_GET["pass"] == 1){
                        echo("<p style='color:red;'><i>Wrong Password!!!!</i></p>");
                    }
                }
            ?>
            <p>
            <input class="submit-button" type="submit" value="Prijavi se">
            </p>
        </form>
    </div>
    
</body>
</html>