
<?php
// Start the session
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database = "rezervacijadvorana";


$conn = new mysqli ($servername, $username, $password, $database);

$sql = "SELECT lozinka, id, administrator FROM nastavnici WHERE e_mail = '".$_GET['email']."'";

$resoult = $conn -> query($sql);

var_dump($sql);
var_dump($resoult);

if ($resoult -> num_rows > 0){

    while ($row = $resoult->fetch_assoc()){
        if(password_verify($_GET['password'], $row["lozinka"])){
            var_dump($row["id"]);
            $_SESSION["id"] = $row["id"];
            $_SESSION["admin"] = $row["administrator"];
            var_dump($_SESSION["id"]);
            header("Location: http://localhost/dvorane");
        }else{
            header("Location: http://localhost/login?pass=1");
        }
    }

}else{
    header("Location: http://localhost/login?user=1");
}










?>