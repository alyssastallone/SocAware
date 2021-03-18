<?php
$servername = "socaware.c5kalmbrxlsb.us-east-2.rds.amazonaws.com";
$username = "admin";
$password = "Capstone21";

// Create connection
//$conn = new mysqli($_SERVER['socaware.c5kalmbrxlsb.us-east-2.rds.amazonaws.com'], $_SERVER['admin'],
//$_SERVER['Capstone21'], $_SERVER['socaware'], $_SERVER['3306']);
$conn = new mysqli($servername, $username, $password);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
?>


