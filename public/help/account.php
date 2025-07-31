<?php
// D.S: Account management help page
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Account management guide - SmartStudy Hub">
    <meta name="keywords" content="account, profile, settings, management">
    <title>Account Management - SmartStudy Hub</title>
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
                <h1>Account Management</h1>
            </div>
            
            <h3>Profile Settings</h3>
            <p>Update your personal information and preferences.</p>
            
            <h3>Password Management</h3>
            <p>Change your password and security settings.</p>
            
            <h3>Session History</h3>
            <p>View your past tutoring sessions and progress.</p>
            
            <h3>Payment Information</h3>
            <p>Manage your payment methods and billing details.</p>
            
            <div class="text-center mt-4">
                <a href="../profile.php" class="btn btn-primary">Go to Profile</a>
                <a href="index.php" class="btn btn-secondary">Back to Help</a>
            </div>
        </div>
    </div>
</body>
</html> 