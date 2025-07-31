<?php
// D.S: About page - Business case description
session_start();
include_once(__DIR__ . '/../config/config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="About SmartStudy Hub - Online tutoring platform connecting students with expert tutors">
    <meta name="keywords" content="about, tutoring, education, online learning, SmartStudy Hub">
    <title>About Us - SmartStudy Hub</title>
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
                <li><a href="about.php" class="active">About</a></li>
                <li><a href="contact.php">Contact</a></li>
                <?php if (isset($_SESSION['user'])): ?>
                    <li><a href="profile.php">Profile</a></li>
                    <li><a href="logout.php">Logout</a></li>
                <?php else: ?>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="register.php">Register</a></li>
                <?php endif; ?>
                <li><a href="help/">Help</a></li>
            </ul>
            <div class="theme-switcher">
                <button onclick="toggleTheme()" class="btn btn-sm">🎨 Theme</button>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>About SmartStudy Hub</h1>
            </div>
            <div class="card-body">
                <h2>Our Mission</h2>
                <p>SmartStudy Hub is an innovative online tutoring platform designed to bridge the gap between students seeking academic excellence and qualified educators passionate about teaching. Our platform serves as a comprehensive educational ecosystem that connects students with expert tutors across 20+ subjects, from mathematics and sciences to languages and test preparation.</p>
                
                <h2>What We Offer</h2>
                <p>Our platform provides a diverse catalog of educational services, each with multiple options to suit different learning needs. Students can choose from various tutoring levels (Beginner, Intermediate, Advanced), different session durations, and specialized focus areas within each subject. For example, in Mathematics, students can select from Algebra, Calculus, Geometry, or Statistics sessions, each with different pricing tiers and tutor specializations.</p>
                
                <h2>Key Features</h2>
                <ul>
                    <li><strong>20+ Subjects:</strong> Comprehensive coverage from core academics to specialized skills</li>
                    <li><strong>Flexible Options:</strong> Multiple session types, durations, and pricing tiers</li>
                    <li><strong>Expert Tutors:</strong> Qualified educators with proven track records</li>
                    <li><strong>Interactive Learning:</strong> Real-time sessions with screen sharing and whiteboard tools</li>
                    <li><strong>Progress Tracking:</strong> Detailed analytics and learning goal management</li>
                    <li><strong>Mobile Responsive:</strong> Learn anywhere, anytime on any device</li>
                </ul>
                
                <h2>Our Business Model</h2>
                <p>SmartStudy Hub operates as a service marketplace, connecting students with qualified tutors. We offer a tiered pricing structure where each subject has multiple options - from basic homework help sessions to comprehensive exam preparation packages. Our platform handles scheduling, payment processing, and session management, while providing both students and tutors with tools for effective communication and progress tracking.</p>
                
                <h2>Technology & Innovation</h2>
                <p>Built with modern web technologies including PHP, MySQL, HTML5, CSS3, and JavaScript, our platform features responsive design, real-time notifications, interactive session tools, and comprehensive analytics. The system supports multiple themes, advanced search functionality, and seamless integration across desktop and mobile devices.</p>
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