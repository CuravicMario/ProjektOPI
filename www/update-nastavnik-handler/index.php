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

if ($_GET["pass"] == ""){
    $sql_lozinka = "SELECT lozinka FROM nastavnici WHERE ID = ".$_GET["id"];
    $lozinka_resoult = $conn -> query($sql_lozinka);
    $lozinka_row = $lozinka_resoult->fetch_assoc();
    $lozinka = $lozinka_row["lozinka"];
}else{
    $lozinka = password_hash($_GET["pass"], PASSWORD_DEFAULT);
}



$sql = "UPDATE nastavnici SET ime = '".$_GET["ime"]."', prezime = '".$_GET["prezime"]."', e_mail = '".$_GET["email"]."', tel = '".$_GET["tel"]."', adresa = '".$_GET["adresa"]."', odjel_id = '".$_GET["odjel"]."', lozinka = '".$lozinka."', updated_at = '".$rowTime["CURRENT_TIMESTAMP"]."', updated_by = '".$_SESSION["id"]."' WHERE ID = ".$_GET["id"];


var_dump($sql);

if($conn -> query($sql)){
    echo("Uspjeh");
    header("Location: http://localhost/nastavnici");
}else{
    echo("Error: " . $sql . "<br>" . $conn->error);
}



?>



