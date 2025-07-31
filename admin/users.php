<?php
// D.S: Admin users management
session_start();
include_once(__DIR__ . '/../config/config.php');

// Simple admin check
if (!isset($_SESSION['user']) || $_SESSION['user']['email'] !== 'admin@smartstudy.com') {
    header('Location: ../login.php');
    exit;
}

$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="User management - SmartStudy Hub Admin">
    <meta name="keywords" content="admin, users, management">
    <title>User Management - SmartStudy Hub</title>
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
                <h1>User Management</h1>
            </div>
            
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td><?= $row['name'] ?></td>
                            <td><?= $row['email'] ?></td>
                            <td>
                                <a href="user_edit.php?id=<?= $row['id'] ?>" class="btn btn-secondary">Edit</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
            
            <div class="text-center mt-4">
                <a href="index.php" class="btn btn-primary">Back to Dashboard</a>
            </div>
        </div>
    </div>
</body>
</html>
