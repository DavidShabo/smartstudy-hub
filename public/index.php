<?php
// D.S: Homepage for SmartStudy Hub - Main landing page with advanced CSS animations
// Features: Hero section, features grid, testimonials, call-to-action
// Developer: [Your Name] - D.S
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="SmartStudy Hub - Online tutoring platform for academic success">
    <meta name="keywords" content="tutoring, online learning, education, academic help, homework help">
    <meta name="author" content="SmartStudy Hub">
    <title>SmartStudy Hub - Online Tutoring Platform</title>
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
                <li><a href="quote_calculator.php">Get Quote</a></li>
                <li><a href="help.php">Help</a></li>
                <li><a href="admin_login.php">Admin</a></li>
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

    <!-- Hero Section -->
    <div class="hero">
        <div class="container">
            <div class="hero-content">
                <h1>Unlock Your Academic Potential</h1>
                <p class="hero-subtitle">Expert tutoring in 20+ subjects. Personalized learning for every student.</p>
                
                <?php if (isset($_SESSION['user'])): ?>
                    <div class="hero-actions">
                        <a href="services.php" class="btn btn-primary">Browse Services</a>
                        <a href="profile.php" class="btn btn-outline">My Dashboard</a>
                    </div>
                <?php else: ?>
                    <div class="hero-actions">
                        <a href="register.php" class="btn btn-primary">Get Started</a>
                        <a href="services.php" class="btn btn-outline">View Services</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="container">
        <!-- Features Section -->
        <div class="features">
            <h2>Why Choose SmartStudy Hub?</h2>
            <div class="grid grid-3">
                <div class="feature">
                    <div class="feature-icon">👨‍🏫</div>
                    <h3>Expert Tutors</h3>
                    <p>Qualified educators with years of experience in their subjects.</p>
                </div>
                <div class="feature">
                    <div class="feature-icon">💻</div>
                    <h3>Online Learning</h3>
                    <p>Learn from anywhere with our interactive online platform.</p>
                </div>
                <div class="feature">
                    <div class="feature-icon">📊</div>
                    <h3>Track Progress</h3>
                    <p>Monitor your learning journey with detailed progress reports.</p>
                </div>
            </div>
        </div>

        <!-- Popular Subjects -->
        <div class="popular-subjects">
            <h2>Popular Subjects</h2>
            <div class="grid grid-4">
                <div class="subject-card">
                    <div class="subject-icon">📐</div>
                    <h4>Mathematics</h4>
                    <p>Algebra, Calculus, Geometry</p>
                </div>
                <div class="subject-card">
                    <div class="subject-icon">⚡</div>
                    <h4>Physics</h4>
                    <p>Mechanics, Thermodynamics</p>
                </div>
                <div class="subject-card">
                    <div class="subject-icon">🧪</div>
                    <h4>Chemistry</h4>
                    <p>Organic, Biochemistry</p>
                </div>
                <div class="subject-card">
                    <div class="subject-icon">📚</div>
                    <h4>English</h4>
                    <p>Literature, Writing</p>
                </div>
            </div>
        </div>

        <!-- Testimonials -->
        <div class="testimonials">
            <h2>What Students Say</h2>
            <div class="grid grid-3">
                <div class="testimonial">
                    <p>"The math tutoring helped me improve my grades significantly!"</p>
                    <div class="testimonial-author">- Sarah, Grade 11</div>
                </div>
                <div class="testimonial">
                    <p>"Great online resources and helpful tutors. Highly recommended!"</p>
                    <div class="testimonial-author">- Mike, College Student</div>
                </div>
                <div class="testimonial">
                    <p>"Perfect for test preparation. I aced my SAT!"</p>
                    <div class="testimonial-author">- Emily, High School Senior</div>
                </div>
            </div>
        </div>

        <!-- Call to Action -->
        <div class="cta-section">
            <h2>Ready to Start Learning?</h2>
            <p>Join thousands of students who have improved their grades with SmartStudy Hub.</p>
            <?php if (!isset($_SESSION['user'])): ?>
                <a href="register.php" class="btn btn-primary">Create Free Account</a>
            <?php else: ?>
                <a href="services.php" class="btn btn-primary">Book Your First Session</a>
            <?php endif; ?>
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
