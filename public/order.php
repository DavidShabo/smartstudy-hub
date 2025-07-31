<?php
// D.S: Individual order page
session_start();
include_once(__DIR__ . '/../config/config.php');

// Redirect if not logged in
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

$order_id = isset($_GET['id']) ? $_GET['id'] : 1;

// Mock order data
$order = [
    'id' => $order_id,
    'subject' => 'Math',
    'date' => '2024-01-15',
    'time' => '14:00',
    'duration' => '1 hour',
    'status' => 'Completed',
    'price' => 50,
    'tutor' => 'Dr. Smith',
    'notes' => 'Algebra review session'
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Order details - SmartStudy Hub">
    <meta name="keywords" content="order, booking, session, details">
    <title>Order Details - SmartStudy Hub</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <nav>
        <div class="container">
            <div class="nav-brand">SmartStudy Hub</div>
            <ul class="nav-links">
                <li><a href="index.php">Home</a></li>
                <li><a href="services.php">Services</a></li>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>Order Details</h1>
            </div>
            
            <div class="grid grid-2">
                <div>
                    <h3>Order Information</h3>
                    <p><strong>Order ID:</strong> #<?= $order['id'] ?></p>
                    <p><strong>Subject:</strong> <?= $order['subject'] ?></p>
                    <p><strong>Date:</strong> <?= $order['date'] ?></p>
                    <p><strong>Time:</strong> <?= $order['time'] ?></p>
                    <p><strong>Duration:</strong> <?= $order['duration'] ?></p>
                    <p><strong>Status:</strong> <?= $order['status'] ?></p>
                    <p><strong>Price:</strong> $<?= $order['price'] ?></p>
                    <p><strong>Tutor:</strong> <?= $order['tutor'] ?></p>
                </div>
                
                <div>
                    <h3>Session Notes</h3>
                    <p><?= $order['notes'] ?></p>
                    
                    <h3>Actions</h3>
                    <a href="rate.php?order=<?= $order['id'] ?>" class="btn btn-primary">Rate Session</a>
                    <a href="book_session.php?subject=<?= $order['subject'] ?>" class="btn btn-outline">Book Similar</a>
                </div>
            </div>
            
            <div class="text-center mt-4">
                <a href="orders.php" class="btn btn-secondary">Back to Orders</a>
            </div>
        </div>
    </div>
</body>
</html>