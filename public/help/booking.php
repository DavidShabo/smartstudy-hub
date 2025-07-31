<?php
// D.S: Booking help page
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Booking sessions guide - SmartStudy Hub">
    <meta name="keywords" content="booking, sessions, tutoring, schedule">
    <title>Booking Sessions - SmartStudy Hub</title>
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
                <h1>Booking Sessions</h1>
            </div>
            
            <h3>How to Book a Session</h3>
            <p>1. Browse available subjects on the Services page</p>
            <p>2. Click "Book Session" on your chosen subject</p>
            <p>3. Select your preferred date and time</p>
            <p>4. Confirm your booking and payment</p>
            
            <h3>Session Types</h3>
            <p>We offer individual and group sessions in various subjects.</p>
            
            <h3>Cancellation Policy</h3>
            <p>Cancel up to 24 hours before your session for a full refund.</p>
            
            <div class="text-center mt-4">
                <a href="../services.php" class="btn btn-primary">Browse Services</a>
                <a href="index.php" class="btn btn-secondary">Back to Help</a>
            </div>
        </div>
    </div>
</body>
</html> 