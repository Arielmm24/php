<?php
$host = "localhost";
$username = "root";
$password = "";
$db = "user_managment";

// Create connection
$conn = new mysqli($host, $username, $password, $db);

// Check connection
if ($conn ->connect_error) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "";
?>