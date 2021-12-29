<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/css/style.css">    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Dvorane</title>
</head>
<body>
    <?php
        if(isset($_SESSION["id"])){         
        } else{
            echo("<p class='reminder'>Za napraviti rezervaciju morate se  <a href='/login' class='undeline'>ulogirati.</a></p>");
        }   
    ?>

    <?php


    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "rezervacijadvorana";


    $conn = new mysqli ($servername, $username, $password, $database);

    $sql = "SELECT * FROM dvorane WHERE deleted_at IS NULL";

    if ($resoult = $conn -> query($sql)){

        if ($resoult -> num_rows > 0){
            while ($row = $resoult->fetch_assoc()){
                echo("
                    <div class='dvorana'>
                    <p class='naziv neg-bot'>".$row["naziv"]."  <a href='/update-dvorana?id=".$row["ID"]."'><i class='fa fa-edit opcije orange'></i></a> <a href='/delete-dvorana?id=".$row["ID"]."'><i class='fa fa-trash-o opcije'></i></a>
                    </p>
                    <br>
                    <p class='opis'>Vrsta dvorane: ".$row["vrsta_dvorane"]."</p> 
                    <p class='opis'>Kapacitet: ".$row["kapacitet"]."</p>                   
                    <p class='opis'>Odjel: ".$row["odjel_id"]."</p> 
                    
                    <div class='text-right'>
                    <button class='reserve-button'>Rezerviraj</button>
                    </div>
                    </div>          
                ");
            }
        
        }

    }else{
        echo("<p class='reminder'>Trenutno nema dvorana</p>");
    }


    if(isset($_SESSION["admin"])) {
        if($_SESSION["admin"] == 1){
            echo("<a href='/dodaj-dvoranu/'>
            <div class='dvorana center'>
            <p class='naziv orange'>Dodaj Novu dvoranu</p>
                <div class='plus'>
            
                </div>  
            </div>   
            </a>       
            ");  


            
        }
        else{
            echo("
                <script>
                    var elements = document.getElementsByClassName('opcije');
                    for (var i = 0; i < elements.length; i++){
                        elements[i].style.display = 'none';
                    }
    
                </script>
                ");  
        }
    }

    

        
   

    ?>




</body>
</html>