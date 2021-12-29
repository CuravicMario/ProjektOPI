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
    <title>Nastavnici</title>
</head>
<body>
    <?php
        if(isset($_SESSION["id"])){           
        } else{
            echo("<p class='reminder'>Za dodavanje novog nastavnika morate se  <a href='/login' class='undeline'>ulogirati</a> kao administrator. </p>");
        }   
    ?>

    <?php


    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "rezervacijadvorana";


    $conn = new mysqli ($servername, $username, $password, $database);

    $sql = "SELECT * FROM nastavnici WHERE deleted_at IS NULL";

    if ($resoult = $conn -> query($sql)){

        if ($resoult -> num_rows > 0){
            while ($row = $resoult->fetch_assoc()){
                echo("
                    <div class='dvorana dva'>
                    <p class='naziv'>".$row["ime"]." ".$row["prezime"]." <a href='/update-nastavnika?id=".$row["ID"]."'><i class='fa fa-edit' class='opcije orange'></i></a> <a href='/delete-nastavnik?id=".$row["ID"]."'><i class='fa fa-trash-o opcije'></i></a>
                    </p>
                    <p class='opis'>Podatci:</p> 
                    <p class='opis'>".$row["e_mail"]."</p> 
                    <p class='opis'>".$row["tel"]."</p>  
                    <p class='opis'>".$row["adresa"]."</p>
                    <p class='opis'>Odjel: ".$row["odjel_id"]."</p> 
                    
                    </div>          
                ");
            }
        
        }

    }

    if(isset($_SESSION["admin"])) {
        if($_SESSION["admin"] == 1){
            echo("<a href='/dodaj-nastavnika'>
            <div class='dvorana center dva'>
            <p class='naziv orange'>Dodaj Novog Nastavnika</p>
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