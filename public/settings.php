<?php
// D.S: User settings page
session_start();
include_once(__DIR__ . '/../config/config.php');

// Redirect if not logged in
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

$user = $_SESSION['user'];
$success = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    
    // Simple validation
    if (empty($name) || empty($email)) {
        $error = 'Name and email are required';
    } else {
        $sql = "UPDATE users SET name = '$name', email = '$email' WHERE id = " . $user['id'];
        if (mysqli_query($conn, $sql)) {
            $success = 'Settings updated successfully!';
            $_SESSION['user']['name'] = $name;
            $_SESSION['user']['email'] = $email;
        } else {
            $error = 'Failed to update settings';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="User settings - SmartStudy Hub">
    <meta name="keywords" content="settings, profile, account, user">
    <title>Settings - SmartStudy Hub</title>
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
                <h1>Settings</h1>
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
                    <input type="text" name="name" class="form-control" value="<?= $user['name'] ?>" required>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Email:</label>
                    <input type="email" name="email" class="form-control" value="<?= $user['email'] ?>" required>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Current Password:</label>
                    <input type="password" name="current_password" class="form-control">
                </div>
                
                <div class="form-group">
                    <label class="form-label">New Password:</label>
                    <input type="password" name="new_password" class="form-control">
                </div>
                
                <button type="submit" class="btn btn-primary">Update Settings</button>
            </form>
            
            <div class="text-center mt-4">
                <a href="profile.php" class="btn btn-secondary">Back to Profile</a>
            </div>
        </div>
    </div>
</body>
</html>
