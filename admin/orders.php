<?php
// D.S: Admin orders management
session_start();
include_once(__DIR__ . '/../config/config.php');

// Simple admin check
if (!isset($_SESSION['user']) || $_SESSION['user']['email'] !== 'admin@smartstudy.com') {
    header('Location: ../login.php');
    exit;
}

// Mock orders data since we don't have an orders table yet
$orders = [
    ['id' => 1, 'user' => 'John Doe', 'subject' => 'Math', 'status' => 'Completed'],
    ['id' => 2, 'user' => 'Jane Smith', 'subject' => 'Physics', 'status' => 'Pending'],
    ['id' => 3, 'user' => 'Bob Johnson', 'subject' => 'English', 'status' => 'Active']
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Order management - SmartStudy Hub Admin">
    <meta name="keywords" content="admin, orders, management">
    <title>Order Management - SmartStudy Hub</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <nav>
        <div class="container">
            <div class="nav-brand">Admin Panel</div>
            <ul class="nav-links">
                <li><a href="index.php">Dashboard</a></li>
                <li><a href="users.php">Users</a></li>
                <li><a href="orders.php">Orders</a></li>
                <li><a href="../index.php">Back to Site</a></li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>Order Management</h1>
            </div>
            
            <table>
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>User</th>
                        <th>Subject</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orders as $order): ?>
                        <tr>
                            <td><?= $order['id'] ?></td>
                            <td><?= $order['user'] ?></td>
                            <td><?= $order['subject'] ?></td>
                            <td><?= $order['status'] ?></td>
                            <td>
                                <a href="order_view.php?id=<?= $order['id'] ?>" class="btn btn-secondary">View</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            
            <div class="text-center mt-4">
                <a href="index.php" class="btn btn-primary">Back to Dashboard</a>
            </div>
        </div>
    </div>
</body>
</html>
