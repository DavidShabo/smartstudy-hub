<?php session_start(); if (!isset($_SESSION['user'])) die("Unauthorized"); ?>
<h2>Order #12345</h2>
<p>Status: Confirmed<br>Total: $50.00</p>