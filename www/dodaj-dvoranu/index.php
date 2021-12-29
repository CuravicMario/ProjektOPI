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
    <form name="form2" action="/dodaj-dvoranu-handler" method="GET">
        <p class="form-label left-neg">Naziv</p>
        <input class="left-neg form-input" type="text" name="naziv" id="naziv">

        <p class="form-label left-neg">Kapacitet</p>
        <input class="left-neg form-input" type="number" name="kapacitet" id="kapacitet">

        <p class="form-label left-neg">ID odjela</p>
        <input class="left-neg form-input" type="text" name="odjel" id="odjel">

        <p class="form-label left-neg">Vrsta dvorane</p>
        <select name="vrsta" class="form-input left-neg">
            <option value="Računalni labos">Računalni labos</option>
            <option value="Amfiteatar">Amfiteatar</option>
            <option value="Obična učionica">Obična učionica</option>
        </select>       


        <p>
        <input class="submit-button" type="submit" value="Dodaj Dvoranu">
        </p>
    </form>
</div>







    
</body>
</html>