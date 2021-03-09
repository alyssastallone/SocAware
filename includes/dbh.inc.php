<?php
$servername = "localhost";
$username = "?????";
$password = "";

// Create connection
$conn = new mysqli($_SERVER['socaware.c5kalmbrxlsb.us-east-2.rds.amazonaws.com'], $_SERVER['RDS_USERNAME'],
$_SERVER['RDS_PASSWORD'], $_SERVER['socaware'], $_SERVER['3306']);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
?>


