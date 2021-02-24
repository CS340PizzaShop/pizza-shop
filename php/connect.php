<?php

$host = "localhost";
$dbusername = "root";
$dbpassword = "root";
$dbname = "pizzeriadb";

    $conn = new msqli($host, $dbusername, $dbpassword, $dbname);

if(!$conn) 
{
    die("Connection failed: " . msqli_connect_error());
}
?>