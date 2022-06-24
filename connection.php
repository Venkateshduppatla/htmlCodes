<?php
$servername = "165.22.14.77";
$username = "venkatesh";
$password = "pwdvenkatesh";
$dbname = "dbVenkatesh";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error)
{
  die("Connection failed: " . $conn->connect_error);
}

?>