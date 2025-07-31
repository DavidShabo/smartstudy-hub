<?php
// D.S: Registration page
session_start();
include_once(__DIR__ . '/../config/config.php');

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    
    // Simple validation
    if (empty($name) || empty($email) || empty($password)) {
        $error = 'Please fill in all fields';
    } else {
        $sql = "INSERT INTO users (name, email, password, role) VALUES ('$name', '$email', '$password', '$role')";
        if (mysqli_query($conn, $sql)) {
            $success = 'Registration successful! Please login.';
        } else {
            $error = 'Registration failed. Email may already exist.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Register for SmartStudy Hub - Online tutoring platform">
    <meta name="keywords" content="register, signup, tutoring, education, online learning">
    <title>Register - SmartStudy Hub</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/theme-dark.css">
    <link rel="stylesheet" href="../assets/css/theme-seasonal.css">
</head>
<body>
    <nav>
        <div class="container">
            <div class="nav-brand">SmartStudy Hub</div>
            <ul class="nav-links">
                <li><a href="index.php">Home</a></li>
                <li><a href="services.php">Services</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
            <div class="theme-switcher">
                <button onclick="toggleTheme()" class="btn btn-secondary">🎨 Theme</button>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>Register</h1>
            </div>
            
            <?php if ($error): ?>
                <div class="alert alert-danger"><?= $error ?></div>
            <?php endif; ?>
            
            <?php if ($success): ?>
                <div class="alert alert-success"><?= $success ?></div>
            <?php endif; ?>
            
            <form method="POST">
                <div class="form-group">
                    <label class="form-label">Name:</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Email:</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Password:</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Account Type:</label>
                    <select name="role" class="form-control" required>
                        <option value="student">Student</option>
                        <option value="tutor">Tutor</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
                
                <button type="submit" class="btn btn-primary">Register</button>
            </form>
            
            <p class="text-center mt-3">
                Already have an account? <a href="login.php">Login here</a>
            </p>
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