<?php
// D.S: Admin Login Page
session_start();
include_once(__DIR__ . '/../config/config.php');

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // Simple validation
    if (empty($email) || empty($password)) {
        $error = 'Please fill in all fields';
    } else {
        $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password' AND role = 'admin'";
        $result = mysqli_query($conn, $sql);
        
        if (mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);
            $_SESSION['user'] = $user;
            header('Location: ../admin/');
            exit;
        } else {
            $error = 'Invalid admin credentials. Please check your email and password.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Admin Login - SmartStudy Hub">
    <meta name="keywords" content="admin, login, management, SmartStudy Hub">
    <title>Admin Login - SmartStudy Hub</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/theme-dark.css">
    <link rel="stylesheet" href="../assets/css/theme-seasonal.css">
</head>
<body>
    <nav>
        <div class="container">
            <div class="nav-brand">
                <a href="index.php">SmartStudy Hub</a>
            </div>
            <ul class="nav-links">
                <li><a href="index.php">Home</a></li>
                <li><a href="services.php">Services</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="login.php">User Login</a></li>
                <li><a href="register.php">Register</a></li>
            </ul>
            <div class="theme-switcher">
                <button onclick="toggleTheme()" class="btn btn-sm">🎨 Theme</button>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>🔐 Admin Login</h1>
                <p>Access the administrative dashboard</p>
            </div>
            
            <?php if ($error): ?>
                <div class="alert alert-danger"><?= $error ?></div>
            <?php endif; ?>
            
            <form method="POST" class="form">
                <div class="form-group">
                    <label for="email" class="form-label">Admin Email:</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>
                
                <div class="form-group">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>
                
                <button type="submit" class="btn btn-primary">Login as Admin</button>
            </form>
            
            <div class="admin-info">
                <h3>Default Admin Credentials:</h3>
                <p><strong>Email:</strong> admin@smartstudy.com</p>
                <p><strong>Password:</strong> admin123</p>
                <p class="note">* If you haven't created an admin user yet, please run the database setup first.</p>
            </div>
            
            <div class="admin-actions">
                <h3>Need Admin Access?</h3>
                <ul>
                    <li><a href="../update_database.php" class="btn btn-outline">Setup Database & Create Admin</a></li>
                    <li><a href="register.php" class="btn btn-outline">Register New Admin Account</a></li>
                    <li><a href="login.php" class="btn btn-outline">Regular User Login</a></li>
                </ul>
            </div>
        </div>
    </div>

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

    <style>
        .admin-info {
            background: var(--gray-50);
            border-radius: var(--radius-md);
            padding: var(--spacing-md);
            margin: var(--spacing-md) 0;
            border-left: 4px solid var(--primary-color);
        }
        
        .admin-info h3 {
            margin-top: 0;
            color: var(--primary-color);
        }
        
        .admin-info .note {
            font-size: 0.9rem;
            color: var(--text-muted);
            font-style: italic;
        }
        
        .admin-actions {
            margin-top: var(--spacing-lg);
            padding-top: var(--spacing-md);
            border-top: 1px solid var(--border-color);
        }
        
        .admin-actions h3 {
            margin-bottom: var(--spacing-sm);
        }
        
        .admin-actions ul {
            list-style: none;
            padding: 0;
        }
        
        .admin-actions li {
            margin-bottom: var(--spacing-sm);
        }
        
        .admin-actions .btn {
            display: inline-block;
            width: 100%;
            text-align: center;
        }
    </style>
</body>
</html> 