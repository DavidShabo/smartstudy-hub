<?php session_start(); if (!isset($_SESSION['admin'])) die("Unauthorized"); ?>
<h2>Welcome Admin</h2>
<ul>
  <li><a href="users.php">Manage Users</a></li>
  <li><a href="services.php">Manage Subjects</a></li>
  <li><a href="themes.php">Change Theme</a></li>
  <li><a href="monitor.php">System Monitor</a></li>
</ul>