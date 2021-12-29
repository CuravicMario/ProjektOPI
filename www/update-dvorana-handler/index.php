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


$sql = "UPDATE dvorane SET naziv = '".$_GET["naziv"]."', kapacitet = '".$_GET["kapacitet"]."', odjel_id = '".$_GET["odjel"]."', vrsta_dvorane = '".$_GET["vrsta"]."', updated_at = '".$rowTime["CURRENT_TIMESTAMP"]."', updated_by = '".$_SESSION["id"]."' WHERE ID = ".$_GET["id"];


var_dump($sql);

if($conn -> query($sql)){
    echo("Uspjeh");
    header("Location: http://localhost/dvorane");
}else{
    echo("Error: " . $sql . "<br>" . $conn->error);
}



?>



