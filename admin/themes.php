<?php
// D.S: Theme management page
session_start();
include_once(__DIR__ . '/../config/config.php');

// Simple admin check
if (!isset($_SESSION['user']) || $_SESSION['user']['email'] !== 'admin@smartstudy.com') {
    header('Location: ../login.php');
    exit;
}

$success = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $theme = $_POST['theme'];
    
    // In a real app, this would save to database
    // For now, we'll use a simple approach
    if (in_array($theme, ['default', 'dark', 'seasonal'])) {
        $success = "Theme changed to: $theme";
    } else {
        $error = 'Invalid theme selected';
    }
}

$current_theme = 'default'; // In real app, get from database
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Theme management - SmartStudy Hub Admin">
    <meta name="keywords" content="admin, themes, management">
    <title>Theme Management - SmartStudy Hub</title>
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
                <li><a href="orders.php">Orders</a></li>
                <li><a href="themes.php">Themes</a></li>
                <li><a href="../index.php">Back to Site</a></li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>Theme Management</h1>
            </div>
            
            <?php if ($error): ?>
                <div class="alert alert-danger"><?= $error ?></div>
            <?php endif; ?>
            
            <?php if ($success): ?>
                <div class="alert alert-success"><?= $success ?></div>
            <?php endif; ?>
            
            <form method="POST">
                <div class="form-group">
                    <label class="form-label">Select Theme:</label>
                    <select name="theme" class="form-control" required>
                        <option value="default" <?= $current_theme === 'default' ? 'selected' : '' ?>>Default Theme</option>
                        <option value="dark" <?= $current_theme === 'dark' ? 'selected' : '' ?>>Dark Theme</option>
                        <option value="seasonal" <?= $current_theme === 'seasonal' ? 'selected' : '' ?>>Seasonal Theme</option>
                    </select>
                </div>
                
                <button type="submit" class="btn btn-primary">Apply Theme</button>
            </form>
            
            <div class="grid grid-3 mt-4">
                <div class="service" onclick="previewTheme('default')">
                    <h3>Default Theme</h3>
                    <p>Clean, professional design with blue color scheme.</p>
                    <button class="btn btn-primary">Preview</button>
                </div>
                
                <div class="service" onclick="previewTheme('dark')">
                    <h3>Dark Theme</h3>
                    <p>Dark mode for better eye comfort in low light.</p>
                    <button class="btn btn-primary">Preview</button>
                </div>
                
                <div class="service" onclick="previewTheme('seasonal')">
                    <h3>Seasonal Theme</h3>
                    <p>Warm autumn colors with decorative elements.</p>
                    <button class="btn btn-primary">Preview</button>
                </div>
            </div>
            
            <div class="text-center mt-4">
                <a href="index.php" class="btn btn-secondary">Back to Dashboard</a>
            </div>
        </div>
    </div>

    <script>
    function previewTheme(theme) {
        document.body.setAttribute('data-theme', theme);
        localStorage.setItem('preview-theme', theme);
    }
    
    // Load saved preview theme
    document.addEventListener('DOMContentLoaded', function() {
        const savedTheme = localStorage.getItem('preview-theme');
        if (savedTheme) {
            document.body.setAttribute('data-theme', savedTheme);
        }
    });
    </script>
</body>
</html> 