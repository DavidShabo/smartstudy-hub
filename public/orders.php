<?php session_start(); if (!isset($_SESSION['user'])) die("Unauthorized"); ?>
<h2>Your Orders</h2>
<p>You currently have no pending orders. (Mock data)</p>