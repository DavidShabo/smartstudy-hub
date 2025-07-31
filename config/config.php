<?php
// D.S: Database connection
$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'smartstudy';

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
?>
