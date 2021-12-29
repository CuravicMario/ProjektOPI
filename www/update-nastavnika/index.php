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
    <title>Ažuriraj Nastavnika</title>
</head>
<body>

        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "rezervacijadvorana";
        
        
        $conn = new mysqli ($servername, $username, $password, $database);
        
        $sql = "SELECT * FROM nastavnici WHERE id = ".$_GET["id"]."";

        $resoult = $conn -> query($sql);

        $row = $resoult->fetch_assoc();

        ?>



    <form class="dvorane-form" name="form2" action="/update-nastavnik-handler" method="GET">
        <?php
            echo("<input type='text' name='id' id='id' value='".$row["ID"]."' readonly style='display:none'>");
        ?>  

        <p class="form-label left-neg">Ime</p>
        <?php
            echo("<input class='left-neg form-input' type='text' name='ime' id='ime' value='".$row["ime"]."'>");
        ?>       
        
        <p class="form-label left-neg">Prezime</p>
        <?php
            echo("<input class='left-neg form-input' type='text' name='prezime' id='prezime' value='".$row["prezime"]."'>");
        ?>
        
        <p class="form-label left-neg">E-mail</p>
        <?php
            echo("<input class='left-neg form-input' type='text' name='email' id='pdv' value='".$row["e_mail"]."'>");
        ?>

        <p class="form-label left-neg">Telefon</p>
        <?php
            echo("<input class='left-neg form-input' type='text' name='tel' id='tel' value='".$row["tel"]."'>");
        ?>

        <p class="form-label left-neg">Adresa</p>
        <?php
            echo("<input class='left-neg form-input' type='text' name='adresa' id='adresa' value='".$row["adresa"]."'>");
        ?>

        <p class="form-label left-neg">ID odjela</p>
        <?php
            echo("<input class='left-neg form-input' type='text' name='odjel' id='odjel' value='".$row["odjel_id"]."'>");
        ?>

        <p class="form-label left-neg">Lozinka</p>
        <?php
            echo("<input class='left-neg form-input' type='password' name='pass' id='pass'>");
        ?>

        <p class="form-label left-neg">Vrsta</p>
        <select name="admin" class="form-input left-neg">
            <option value="administrator">Administrator</option>
            <option value="nastavnik">Nastavnik</option>
        </select>
        

        <p>
        <input class="submit-button" type="submit" value="Ažuriraj">
        </p>
    </form>








    
</body>
</html>