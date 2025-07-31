<?php
// D.S: Help documentation main page
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Help documentation - SmartStudy Hub">
    <meta name="keywords" content="help, documentation, support, tutoring">
    <title>Help - SmartStudy Hub</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>
    <nav>
        <div class="container">
            <div class="nav-brand">SmartStudy Hub</div>
            <ul class="nav-links">
                <li><a href="../index.php">Home</a></li>
                <li><a href="../services.php">Services</a></li>
                <li><a href="index.php">Help</a></li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>Help Documentation</h1>
            </div>
            
            <div class="grid grid-2">
                <div class="service">
                    <h3>Getting Started</h3>
                    <p>Learn how to use SmartStudy Hub for the first time.</p>
                    <a href="getting-started.php" class="btn btn-primary">Read Guide</a>
                </div>
                
                <div class="service">
                    <h3>Account Management</h3>
                    <p>Manage your account settings and profile information.</p>
                    <a href="account.php" class="btn btn-primary">Learn More</a>
                </div>
                
                <div class="service">
                    <h3>Booking Sessions</h3>
                    <p>How to book and manage tutoring sessions.</p>
                    <a href="booking.php" class="btn btn-primary">View Guide</a>
                </div>
                
                <div class="service">
                    <h3>Admin Guide</h3>
                    <p>Administrative functions and user management.</p>
                    <a href="admin.php" class="btn btn-primary">Admin Help</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html> 