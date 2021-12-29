<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <title>Dodavanje Nastavnika</title>
</head>
<body>


<div class="dvorane-form">
    <form name="form2" action="/dodaj-nastavnika-handler" method="GET">
        <p class="form-label left-neg">Ime</p>
        <input class="left-neg form-input" type="text" name="ime" id="ime">

        <p class="form-label left-neg">Prezime</p>
        <input class="left-neg form-input" type="text" name="prezime" id="prezime">
        
        <p class="form-label left-neg">E-mail</p>
        <input class="left-neg form-input" type="email" name="email" id="email">

        <p class="form-label left-neg">Telefon</p>
        <input class="left-neg form-input" type="text" name="tel" id="tel">

        <p class="form-label left-neg">Adresa</p>
        <input class="left-neg form-input" type="text" name="adresa" id="adresa">

        <p class="form-label left-neg">ID odjela</p>
        <input class="left-neg form-input" type="text" name="odjel" id="odjel">

        <p class="form-label left-neg">Lozinka</p>
        <input class="left-neg form-input" type="password" name="pass" id="pass">

        <p class="form-label left-neg">Vrsta</p>
        <select name="admin" class="form-input left-neg">
            <option value="administrator">Administrator</option>
            <option value="nastavnik">Nastavnik</option>
        </select>


        <p>
        <input class="submit-button" type="submit" value="Dodaj Korisnika">
        </p>
    </form>
</div>







    
</body>
</html>