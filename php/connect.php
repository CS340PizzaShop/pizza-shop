<?php

$host = "localhost";
$dbusername = "root";
//
$dbpassword = "";
//=======
$dbpassword = '';
//>>>>>>> 653cc1a87b2c08be7abb06c59fbb02b0ae55e361
$dbname = "pizzeriadb";

    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

if(!$conn) 
{
    die("Connection failed: " . mysqli_connect_error());
}
?>