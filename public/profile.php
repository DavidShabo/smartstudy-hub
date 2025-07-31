<?php session_start(); if (!isset($_SESSION['user'])) die("Unauthorized"); ?>
<h2>Hello, <?= $_SESSION['user']['name'] ?></h2>
<a href="settings.php">Settings</a> | <a href="logout.php">Logout</a>
