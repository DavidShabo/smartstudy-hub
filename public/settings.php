<?php session_start(); if (!isset($_SESSION['user'])) die("Unauthorized"); ?>
<h2>Account Settings</h2>
<p>Email: <?= $_SESSION['user']['email'] ?><br><a href="logout.php">Logout</a></p>
