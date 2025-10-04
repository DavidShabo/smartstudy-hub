<?php
// D.S: Book session page
session_start();
include_once(__DIR__ . '/../config/config.php');
include_once(__DIR__ . '/../config/database.php');

// Redirect if not logged in
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

$success = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $subject = $_POST['subject'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $duration = $_POST['duration'];
    $notes = $_POST['notes'];
    
    // Simple validation
    if (empty($subject) || empty($date) || empty($time)) {
        $error = 'Please fill in all required fields';
    } else {
        $success = 'Session booked successfully! Redirecting to checkout...';
        // In real app, would redirect to checkout
    }
}

// Get subject from URL parameter
$selected_subject = isset($_GET['subject']) ? $_GET['subject'] : '';

// Get subjects from database
$subjects = getAllSubjects();
if (empty($subjects)) {
    // Fallback subjects if database fails
    $subjects = [
        ['name' => 'Mathematics', 'price' => 50],
        ['name' => 'Physics', 'price' => 55],
        ['name' => 'Chemistry', 'price' => 50],
        ['name' => 'Biology', 'price' => 45],
        ['name' => 'English Literature', 'price' => 40],
        ['name' => 'Computer Science', 'price' => 60]
    ];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Book a tutoring session - SmartStudy Hub">
    <meta name="keywords" content="book, session, tutoring, schedule, SmartStudy Hub">
    <title>Book Session - SmartStudy Hub</title>
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
                <li><a href="quote_calculator.php">Get Quote</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
                <?php if (isset($_SESSION['user'])): ?>
                    <li><a href="profile.php">Profile</a></li>
                    <li><a href="logout.php">Logout</a></li>
                <?php else: ?>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="register.php">Register</a></li>
                <?php endif; ?>
                <li><a href="help.php">Help</a></li>
            </ul>
            <div class="theme-switcher">
                <button onclick="toggleTheme()" class="btn btn-sm">🎨 Theme</button>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>Book a Session</h1>
                <p>Schedule your tutoring session with our expert tutors</p>
            </div>
            
            <?php if ($error): ?>
                <div class="alert alert-danger"><?= $error ?></div>
            <?php endif; ?>
            
            <?php if ($success): ?>
                <div class="alert alert-success"><?= $success ?></div>
            <?php endif; ?>
            
            <div class="card-body">
                <form method="POST" class="form">
                    <div class="form-group">
                        <label for="subject">Subject *</label>
                        <select id="subject" name="subject" class="form-control" required>
                            <option value="">Select a subject</option>
                            <?php foreach ($subjects as $subject): ?>
                                <option value="<?= $subject['name'] ?>" <?= $selected_subject === $subject['name'] ? 'selected' : '' ?>>
                                    <?= $subject['name'] ?> - $<?= number_format($subject['price'], 2) ?>/hour
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="date">Date *</label>
                        <input type="date" id="date" name="date" class="form-control" required 
                               min="<?= date('Y-m-d') ?>" value="<?= date('Y-m-d') ?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="time">Time *</label>
                        <input type="time" id="time" name="time" class="form-control" required 
                               min="09:00" max="21:00" value="14:00">
                    </div>
                    
                    <div class="form-group">
                        <label for="duration">Duration *</label>
                        <select id="duration" name="duration" class="form-control" required>
                            <option value="1">1 hour - $50</option>
                            <option value="1.5">1.5 hours - $75</option>
                            <option value="2">2 hours - $100</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="notes">Notes (optional)</label>
                        <textarea id="notes" name="notes" class="form-control" rows="3" 
                                  placeholder="Any specific topics, questions, or special requirements..."></textarea>
                    </div>
                    
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Book Session</button>
                        <a href="services.php" class="btn btn-outline">Back to Services</a>
                    </div>
                </form>
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