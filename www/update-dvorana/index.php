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
        
        $sql = "SELECT * FROM dvorane WHERE id = ".$_GET["id"]."";

        $resoult = $conn -> query($sql);

        $row = $resoult->fetch_assoc();

        ?>



    <form class="dvorane-form" name="form2" action="/update-dvorana-handler" method="GET">
        <?php
            echo("<input type='text' name='id' id='id' value='".$row["ID"]."' readonly style='display:none'>");
        ?>  

        <p class="form-label left-neg">Naziv</p>
        <?php
            echo("<input class='left-neg form-input' type='text' name='naziv' id='naziv' value='".$row["naziv"]."'>");
        ?>       
        
        <p class="form-label left-neg">Kapacitet</p>
        <?php
            echo("<input class='left-neg form-input' type='number' name='kapacitet' id='kapacitet' value='".$row["kapacitet"]."'>");
        ?>
        
        <p class="form-label left-neg">ID odjela</p>
        <?php
            echo("<input class='left-neg form-input' type='text' name='odjel' id='odjel' value='".$row["odjel_id"]."'>");
        ?>

        <p class="form-label left-neg">Vrsta dvorane</p>
        <select name="vrsta" class="form-input left-neg">
            <option value="Računalni labos">Računalni labos</option>
            <option value="Amfiteatar">Amfiteatar</option>
            <option value="Obična učionica">Obična učionica</option>
        </select>  
        

        <p>
        <input class="submit-button" type="submit" value="Ažuriraj">
        </p>
    </form>








    
</body>
</html>