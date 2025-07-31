<?php
// D.S: Admin help page
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Admin guide - SmartStudy Hub">
    <meta name="keywords" content="admin, management, administration, tutoring">
    <title>Admin Guide - SmartStudy Hub</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>
    <nav>
        <div class="container">
            <div class="nav-brand">SmartStudy Hub</div>
            <ul class="nav-links">
                <li><a href="../index.php">Home</a></li>
                <li><a href="index.php">Help</a></li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>Admin Guide</h1>
            </div>
            
            <h3>User Management</h3>
            <p>View, edit, and manage user accounts and permissions.</p>
            
            <h3>Service Management</h3>
            <p>Add, edit, and remove tutoring services and subjects.</p>
            
            <h3>Order Management</h3>
            <p>Track and manage tutoring session bookings and payments.</p>
            
            <h3>System Monitoring</h3>
            <p>Monitor website performance and user activity.</p>
            
            <div class="text-center mt-4">
                <a href="../admin/index.php" class="btn btn-primary">Admin Panel</a>
                <a href="index.php" class="btn btn-secondary">Back to Help</a>
            </div>
        </div>
    </div>
</body>
</html> 