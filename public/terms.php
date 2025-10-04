<?php
// D.S: Terms of service page
session_start();
include_once(__DIR__ . '/../config/config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Terms of Service - SmartStudy Hub">
    <meta name="keywords" content="terms, service, legal, SmartStudy Hub">
    <title>Terms of Service - SmartStudy Hub</title>
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
                <h1>Terms of Service</h1>
                <p class="text-muted">Last updated: January 2024</p>
            </div>
            <div class="card-body">
                <h2>1. Acceptance of Terms</h2>
                <p>By accessing and using SmartStudy Hub, you accept and agree to be bound by the terms and provision of this agreement.</p>
                
                <h2>2. Description of Service</h2>
                <p>SmartStudy Hub provides an online tutoring platform connecting students with qualified tutors. Our services include scheduling, payment processing, and session management.</p>
                
                <h2>3. User Accounts</h2>
                <p>You are responsible for maintaining the confidentiality of your account and password. You agree to accept responsibility for all activities that occur under your account.</p>
                
                <h2>4. Payment Terms</h2>
                <p>All tutoring sessions must be paid for in advance. Refunds are available within 24 hours of session cancellation. No refunds for completed sessions.</p>
                
                <h2>5. Code of Conduct</h2>
                <p>Users must behave respectfully during sessions. Harassment, inappropriate behavior, or violation of academic integrity will result in account termination.</p>
                
                <h2>6. Privacy Policy</h2>
                <p>Your privacy is important to us. Please review our Privacy Policy, which also governs your use of the Service.</p>
                
                <h2>7. Intellectual Property</h2>
                <p>All content on SmartStudy Hub, including text, graphics, logos, and software, is the property of SmartStudy Hub and is protected by copyright laws.</p>
                
                <h2>8. Limitation of Liability</h2>
                <p>SmartStudy Hub is not liable for any indirect, incidental, special, consequential, or punitive damages resulting from your use of the service.</p>
                
                <h2>9. Termination</h2>
                <p>We may terminate or suspend your account immediately, without prior notice, for any reason, including breach of these Terms of Service.</p>
                
                <h2>10. Changes to Terms</h2>
                <p>We reserve the right to modify these terms at any time. We will notify users of any material changes via email or website notice.</p>
                
                <h2>11. Contact Information</h2>
                <p>If you have any questions about these Terms of Service, please contact us at legal@smartstudyhub.com.</p>
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