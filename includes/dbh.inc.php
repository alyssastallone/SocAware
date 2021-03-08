<?php

$servername = "localhost";
$username = ";
$password = "";
$dbname = ""; //name of database on 

// Create connection
$conn = new mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . mnysqli_connect_error());
}

$sql = "SELECT FName, LName FROM LoginDB";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " - Name: " . $row[“FName"]. " " . $row[“LName"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>

// Code to connect login database to website
