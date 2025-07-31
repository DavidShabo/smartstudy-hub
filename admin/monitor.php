<?php
// D.S: Admin monitoring page
session_start();
include_once(__DIR__ . '/../config/config.php');
include_once(__DIR__ . '/../config/database.php');

// Check if user is admin
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header('Location: ../public/login.php');
    exit;
}

// Get system status
$dbStatus = testDBConnection();
$services = getAllSubjects();
$totalServices = count($services);
$totalUsers = 0; // Would get from database in real implementation

// Mock service statuses
$serviceStatuses = [
    'Database Connection' => $dbStatus ? 'Online' : 'Offline',
    'User Authentication' => 'Online',
    'Payment Processing' => 'Online',
    'Email Service' => 'Online',
    'File Upload' => 'Online',
    'Session Management' => 'Online'
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="System Monitoring - SmartStudy Hub Admin">
    <meta name="keywords" content="admin, monitoring, system status, SmartStudy Hub">
    <title>System Monitoring - SmartStudy Hub Admin</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/theme-dark.css">
    <link rel="stylesheet" href="../assets/css/theme-seasonal.css">
</head>
<body>
    <nav>
        <div class="container">
            <div class="nav-brand">
                <a href="index.php">SmartStudy Hub Admin</a>
            </div>
            <ul class="nav-links">
                <li><a href="index.php">Dashboard</a></li>
                <li><a href="users.php">Users</a></li>
                <li><a href="orders.php">Orders</a></li>
                <li><a href="themes.php">Themes</a></li>
                <li><a href="monitor.php" class="active">Monitor</a></li>
            </ul>
            <div class="theme-switcher">
                <button onclick="toggleTheme()" class="btn btn-sm">🎨 Theme</button>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>System Monitoring</h1>
                <p>Real-time status of all system components and services</p>
            </div>
            <div class="card-body">
                <div class="grid grid-3">
                    <div class="status-card">
                        <div class="status-icon <?= $dbStatus ? 'online' : 'offline' ?>">
                            <?= $dbStatus ? '✅' : '❌' ?>
                        </div>
                        <h3>Database</h3>
                        <p class="status-text"><?= $dbStatus ? 'Connected' : 'Disconnected' ?></p>
                    </div>
                    
                    <div class="status-card">
                        <div class="status-icon online">✅</div>
                        <h3>Web Server</h3>
                        <p class="status-text">Running</p>
                    </div>
                    
                    <div class="status-card">
                        <div class="status-icon online">✅</div>
                        <h3>PHP</h3>
                        <p class="status-text">Active</p>
                    </div>
                </div>
                
                <h2>Service Status</h2>
                <div class="service-status-grid">
                    <?php foreach ($serviceStatuses as $service => $status): ?>
                        <div class="service-status-item">
                            <div class="service-name"><?= $service ?></div>
                            <div class="service-status <?= strtolower($status) ?>">
                                <?= $status ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                
                <h2>System Statistics</h2>
                <div class="stats-grid">
                    <div class="stat-item">
                        <div class="stat-number"><?= $totalServices ?></div>
                        <div class="stat-label">Total Services</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number"><?= $totalUsers ?></div>
                        <div class="stat-label">Registered Users</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">3</div>
                        <div class="stat-label">Active Themes</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">99.9%</div>
                        <div class="stat-label">Uptime</div>
                    </div>
                </div>
                
                <h2>Recent Activity</h2>
                <div class="activity-log">
                    <div class="activity-item">
                        <span class="activity-time"><?= date('H:i:s') ?></span>
                        <span class="activity-text">System monitoring page accessed</span>
                    </div>
                    <div class="activity-item">
                        <span class="activity-time"><?= date('H:i:s', time() - 300) ?></span>
                        <span class="activity-text">Database connection verified</span>
                    </div>
                    <div class="activity-item">
                        <span class="activity-time"><?= date('H:i:s', time() - 600) ?></span>
                        <span class="activity-text">Theme system updated</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <div class="container">
            <p>&copy; 2024 SmartStudy Hub. All rights reserved.</p>
        </div>
    </footer>

    <script>
        function toggleTheme() {
            const body = document.body;
            const currentTheme = body.getAttribute('data-theme');
            let newTheme = 'default';
            
            if (currentTheme === 'default' || !currentTheme) {
                newTheme = 'dark';
            } else if (currentTheme === 'dark') {
                newTheme = 'seasonal';
            } else {
                newTheme = 'default';
            }
            
            body.setAttribute('data-theme', newTheme);
            localStorage.setItem('theme', newTheme);
        }

        document.addEventListener('DOMContentLoaded', function() {
            const savedTheme = localStorage.getItem('theme');
            if (savedTheme) {
                document.body.setAttribute('data-theme', savedTheme);
            }
        });
    </script>
</body>
</html> 