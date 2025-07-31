<?php
// D.S: Admin dashboard
session_start();
include_once(__DIR__ . '/../config/config.php');

// Simple admin check
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header('Location: ../public/login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Admin dashboard - SmartStudy Hub">
    <meta name="keywords" content="admin, dashboard, management">
    <title>Admin Dashboard - SmartStudy Hub</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/theme-dark.css">
    <link rel="stylesheet" href="../assets/css/theme-seasonal.css">
</head>
<body>
    <nav>
        <div class="container">
            <div class="nav-brand">Admin Panel</div>
            <ul class="nav-links">
                <li><a href="index.php">Dashboard</a></li>
                                            <li><a href="users.php">Users</a></li>
                            <li><a href="services.php">Services</a></li>
                            <li><a href="orders.php">Orders</a></li>
                            <li><a href="themes.php">Themes</a></li>
                            <li><a href="monitor.php">Monitor</a></li>
                <li><a href="../index.php">Back to Site</a></li>
            </ul>
            <div class="theme-switcher">
                <button onclick="toggleTheme()" class="btn btn-secondary">🎨 Theme</button>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>Admin Dashboard</h1>
            </div>
            
            <div class="grid grid-3">
                <div class="service">
                    <h3>User Management</h3>
                    <p>Manage user accounts and permissions.</p>
                    <a href="users.php" class="btn btn-primary">Manage Users</a>
                </div>
                
                <div class="service">
                    <h3>Order Management</h3>
                    <p>Track and manage tutoring sessions.</p>
                    <a href="orders.php" class="btn btn-primary">View Orders</a>
                </div>
                
                <div class="service">
                    <h3>Theme Management</h3>
                    <p>Switch between different site themes and layouts.</p>
                    <a href="themes.php" class="btn btn-primary">Manage Themes</a>
                </div>
            </div>
        </div>
    </div>

    <script>
    function toggleTheme() {
        const currentTheme = document.body.getAttribute('data-theme');
        let newTheme = 'default';
        
        if (currentTheme === 'default') {
            newTheme = 'dark';
        } else if (currentTheme === 'dark') {
            newTheme = 'seasonal';
        } else {
            newTheme = 'default';
        }
        
        document.body.setAttribute('data-theme', newTheme);
        localStorage.setItem('theme', newTheme);
    }
    
    // Load saved theme
    document.addEventListener('DOMContentLoaded', function() {
        const savedTheme = localStorage.getItem('theme');
        if (savedTheme) {
            document.body.setAttribute('data-theme', savedTheme);
        }
    });
    </script>
</body>
</html>