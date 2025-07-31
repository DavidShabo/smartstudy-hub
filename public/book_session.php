<?php session_start(); if (!isset($_SESSION['user'])) die("Login required"); ?>
<h2>Book a Tutoring Session</h2>
<form method="POST">
  <label>Subject:</label> <input type="text" name="subject" required><br>
  <label>Date:</label> <input type="date" name="date" required><br>
  <label>Time:</label> <input type="time" name="time" required><br>
  <button>Book</button>
</form>