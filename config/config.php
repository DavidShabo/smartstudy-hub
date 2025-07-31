<?php
// D.S: Database connection - Central configuration for MySQL database
// Developer: [Your Name] - D.S
// Handles all database connections throughout the application
$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'smartstudy';

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
?>
