<?php
// Start the session
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database = "rezervacijadvorana";


$conn = new mysqli ($servername, $username, $password, $database);



$timestamp = $conn -> query("SELECT CURRENT_TIMESTAMP");

$rowTime = $timestamp->fetch_assoc();

var_dump($rowTime);



var_dump($timestamp);



$sql = "UPDATE nastavnici SET deleted_at = '".$rowTime["CURRENT_TIMESTAMP"]."', deleted_by = '".$_SESSION["id"]."' WHERE id = ".$_GET["id"];


var_dump($sql);

if($conn -> query($sql)){
    echo("Uspjeh");
    header("Location: http://localhost/nastavnici");
}else{
    echo("Error: " . $sql . "<br>" . $conn->error);
}



?>