<?php
// D.S: Checkout page
session_start();
include_once(__DIR__ . '/../config/config.php');

// Redirect if not logged in
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

$success = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $card_number = $_POST['card_number'];
    $expiry = $_POST['expiry'];
    $cvv = $_POST['cvv'];
    
    // Simple validation
    if (empty($card_number) || empty($expiry) || empty($cvv)) {
        $error = 'Please fill in all payment fields';
    } else {
        $success = 'Payment processed successfully! Your session is booked.';
    }
}

// Mock session data
$session = [
    'subject' => 'Math',
    'date' => '2024-02-01',
    'time' => '15:00',
    'duration' => '1 hour',
    'price' => 50
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Checkout - SmartStudy Hub">
    <meta name="keywords" content="checkout, payment, booking, tutoring">
    <title>Checkout - SmartStudy Hub</title>
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
                <h1>Checkout</h1>
            </div>
            
            <?php if ($error): ?>
                <div class="alert alert-danger"><?= $error ?></div>
            <?php endif; ?>
            
            <?php if ($success): ?>
                <div class="alert alert-success"><?= $success ?></div>
            <?php endif; ?>
            
            <div class="grid grid-2">
                <div>
                    <h3>Session Summary</h3>
                    <p><strong>Subject:</strong> <?= $session['subject'] ?></p>
                    <p><strong>Date:</strong> <?= $session['date'] ?></p>
                    <p><strong>Time:</strong> <?= $session['time'] ?></p>
                    <p><strong>Duration:</strong> <?= $session['duration'] ?></p>
                    <p><strong>Total:</strong> $<?= $session['price'] ?></p>
                </div>
                
                <div>
                    <h3>Payment Information</h3>
                    <form method="POST">
                        <div class="form-group">
                            <label class="form-label">Card Number:</label>
                            <input type="text" name="card_number" class="form-control" placeholder="1234 5678 9012 3456" required>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">Expiry Date:</label>
                            <input type="text" name="expiry" class="form-control" placeholder="MM/YY" required>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">CVV:</label>
                            <input type="text" name="cvv" class="form-control" placeholder="123" required>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Process Payment</button>
                    </form>
                </div>
            </div>
            
            <div class="text-center mt-4">
                <a href="book_session.php" class="btn btn-secondary">Back to Booking</a>
            </div>
        </div>
    </div>
</body>
</html>
