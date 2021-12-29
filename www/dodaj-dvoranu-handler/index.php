<?php
// Start the session
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database = "rezervacijadvorana";


$conn = new mysqli ($servername, $username, $password, $database);



var_dump($username);



$sql = "INSERT INTO dvorane (naziv, kapacitet, odjel_id, vrsta_dvorane, created_by) VALUES ('".$_GET["naziv"]."', '".$_GET["kapacitet"]."', '".$_GET["odjel"]."', '".$_GET["vrsta"]."', '".$_SESSION["id"]."')";


var_dump($sql);

if($conn -> query($sql)){
    echo("Uspjeh");
    header("Location: http://localhost/dvorane");
}else{
    echo("Error: " . $sql . "<br>" . $conn->error);
}








?>