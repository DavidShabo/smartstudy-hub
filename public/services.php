<?php
// D.S: Services page
session_start();
include_once(__DIR__ . '/../config/config.php');
include_once(__DIR__ . '/../config/database.php');

// Get services from database
$services = getAllSubjects();

// If database connection fails, use fallback data
if (empty($services)) {
    $services = [
        ['name' => 'Mathematics', 'level' => 'All Levels', 'description' => 'Expert help with algebra, calculus, geometry, and statistics. One-on-one tutoring available.', 'action' => 'book', 'icon' => '📐', 'price' => 25.00],
        ['name' => 'Physics', 'level' => 'High School & College', 'description' => 'Master mechanics, thermodynamics, and quantum physics with experienced tutors.', 'action' => 'book', 'icon' => '⚡', 'price' => 30.00],
        ['name' => 'Chemistry', 'level' => 'All Levels', 'description' => 'Learn organic chemistry, biochemistry, and laboratory techniques.', 'action' => 'book', 'icon' => '🧪', 'price' => 28.00],
        ['name' => 'English Literature', 'level' => 'High School & College', 'description' => 'Essay writing, literary analysis, and creative writing workshops.', 'action' => 'book', 'icon' => '📚', 'price' => 22.00],
        ['name' => 'Biology', 'level' => 'All Levels', 'description' => 'Cell Biology, Genetics, Ecology, Anatomy', 'action' => 'book', 'icon' => '🧬', 'price' => 26.00],
        ['name' => 'Computer Science', 'level' => 'Intermediate & Advanced', 'description' => 'Programming, Algorithms, Data Structures', 'action' => 'book', 'icon' => '💻', 'price' => 35.00],
        ['name' => 'History', 'level' => 'All Levels', 'description' => 'World History, American History, European History', 'action' => 'book', 'icon' => '📜', 'price' => 20.00],
        ['name' => 'Geography', 'level' => 'Beginner & Intermediate', 'description' => 'Physical Geography, Human Geography, Cartography', 'action' => 'book', 'icon' => '🌍', 'price' => 18.00],
        ['name' => 'Economics', 'level' => 'Advanced', 'description' => 'Microeconomics, Macroeconomics, International Trade', 'action' => 'book', 'icon' => '💰', 'price' => 32.00],
        ['name' => 'French Language', 'level' => 'Beginner to Advanced', 'description' => 'Conversational French, Grammar, Literature', 'action' => 'book', 'icon' => '🇫🇷', 'price' => 24.00],
        ['name' => 'Art & Design', 'level' => 'All Levels', 'description' => 'Drawing, Painting, Digital Art, Art History', 'action' => 'book', 'icon' => '🎨', 'price' => 27.00],
        ['name' => 'Music Theory', 'level' => 'Intermediate & Advanced', 'description' => 'Music Theory, Composition, Instrument Lessons', 'action' => 'book', 'icon' => '🎵', 'price' => 29.00]
    ];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Browse tutoring services - SmartStudy Hub">
    <meta name="keywords" content="tutoring services, subjects, academic help, online learning">
    <title>Services - SmartStudy Hub</title>
    <link rel="stylesheet" href="../assets/css/base.css">
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
                <?php if (isset($_SESSION['user'])): ?>
                    <li><a href="profile.php">Profile</a></li>
                    <li><a href="logout.php">Logout</a></li>
                <?php else: ?>
                    <li><a href="register.php">Register</a></li>
                    <li><a href="login.php">Login</a></li>
                <?php endif; ?>
            </ul>
            <div class="theme-switcher">
                <button onclick="toggleTheme()" class="btn btn-secondary">🎨 Theme</button>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>Our Services</h1>
                <p>Choose from our comprehensive range of tutoring services. We offer personalized learning experiences for students of all levels.</p>
            </div>
            
            <div class="grid grid-3 mb-4">
                <div class="service-highlight">
                    <h4>📚 Academic Subjects</h4>
                    <p>Core subjects like Math, Science, and Literature</p>
                </div>
                <div class="service-highlight">
                    <h4>🎯 Study Skills</h4>
                    <p>Test prep, time management, and learning strategies</p>
                </div>
                <div class="service-highlight">
                    <h4>💻 Modern Skills</h4>
                    <p>Computer science, programming, and digital literacy</p>
                </div>
            </div>
            
            <div class="services">
                <?php 
                // Services array is now loaded from database above
                
                foreach ($services as $service): ?>
                    <div class="service">
                        <div class="service-icon"><?= $service['icon'] ?? '📚' ?></div>
                        <h3><?= $service['name'] ?></h3>
                        <p class="service-level">Level: <?= $service['level'] ?></p>
                        <p class="service-description"><?= $service['description'] ?></p>
                        <p class="service-price">$<?= number_format($service['price'] ?? 25.00, 2) ?>/hour</p>
                        
                        <a href="book_session.php?subject=<?= urlencode($service['name']) ?>" class="btn btn-primary">Book Session</a>
                    </div>
                <?php endforeach; ?>
            </div>
            
            <div class="text-center mt-4">
                <a href="index.php" class="btn btn-secondary">Back to Home</a>
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
