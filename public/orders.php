<?php
// D.S: Orders page
session_start();
include_once(__DIR__ . '/../config/config.php');

// Redirect if not logged in
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

$user = $_SESSION['user'];

// Mock orders data
$orders = [
    ['id' => 1, 'subject' => 'Math', 'date' => '2024-01-15', 'status' => 'Completed', 'price' => 50],
    ['id' => 2, 'subject' => 'Physics', 'date' => '2024-01-20', 'status' => 'Pending', 'price' => 60],
    ['id' => 3, 'subject' => 'English', 'date' => '2024-01-25', 'status' => 'Active', 'price' => 45]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="My orders - SmartStudy Hub">
    <meta name="keywords" content="orders, bookings, sessions, tutoring">
    <title>My Orders - SmartStudy Hub</title>
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
                <h1>My Orders</h1>
            </div>
            
            <table>
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Subject</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orders as $order): ?>
                        <tr>
                            <td><?= $order['id'] ?></td>
                            <td><?= $order['subject'] ?></td>
                            <td><?= $order['date'] ?></td>
                            <td><?= $order['status'] ?></td>
                            <td>$<?= $order['price'] ?></td>
                            <td>
                                <a href="order.php?id=<?= $order['id'] ?>" class="btn btn-secondary">View</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            
            <div class="text-center mt-4">
                <a href="book_session.php" class="btn btn-primary">Book New Session</a>
                <a href="profile.php" class="btn btn-secondary">Back to Profile</a>
            </div>
        </div>
    </div>
</body>
</html>