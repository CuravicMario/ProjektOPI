<?php
// Start the session
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database = "rezervacijadvorana";


$conn = new mysqli ($servername, $username, $password, $database);



$lozinka = password_hash($_GET["pass"], PASSWORD_DEFAULT);

var_dump($username);

if ($_GET["admin"] == 'administrator'){
    $admin = 1;
}else{
    $admin = 0;
}

$sql = "INSERT INTO nastavnici (ime, prezime, e_mail, odjel_id, tel, adresa, administrator, lozinka, created_by) VALUES ('".$_GET["ime"]."', '".$_GET["prezime"]."', '".$_GET["email"]."', '".$_GET["odjel"]."', '".$_GET["tel"]."', '".$_GET["adresa"]."', '".$admin."', '".$lozinka."', '".$_SESSION["id"]."')";


var_dump($sql);

if($conn -> query($sql)){
    echo("Uspjeh");
    //header("Location: http://localhost/artikli");
}else{
    echo("Error: " . $sql . "<br>" . $conn->error);
}








?>