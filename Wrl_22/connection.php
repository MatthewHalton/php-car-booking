<?php

// Connection
$host = "localhost";
$username = "mhalton";
$password = "Password12";
$dbname = "mhalton_wrl22";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error){
  die("Connection failed: " . $conn->connect_error);
}

session_start();

?>
