<?php
// D.S: Privacy policy page
session_start();
include_once(__DIR__ . '/../config/config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Privacy Policy - SmartStudy Hub">
    <meta name="keywords" content="privacy, policy, data protection, SmartStudy Hub">
    <title>Privacy Policy - SmartStudy Hub</title>
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
                <h1>Privacy Policy</h1>
                <p class="text-muted">Last updated: January 2024</p>
            </div>
            <div class="card-body">
                <h2>1. Information We Collect</h2>
                <p>We collect information you provide directly to us, such as when you create an account, book a session, or contact us. This includes:</p>
                <ul>
                    <li>Name and contact information</li>
                    <li>Account credentials</li>
                    <li>Payment information</li>
                    <li>Session preferences and history</li>
                    <li>Communications with tutors and support</li>
                </ul>
                
                <h2>2. How We Use Your Information</h2>
                <p>We use the information we collect to:</p>
                <ul>
                    <li>Provide and maintain our services</li>
                    <li>Process payments and transactions</li>
                    <li>Connect you with appropriate tutors</li>
                    <li>Send you important updates and notifications</li>
                    <li>Improve our platform and services</li>
                    <li>Comply with legal obligations</li>
                </ul>
                
                <h2>3. Information Sharing</h2>
                <p>We do not sell, trade, or otherwise transfer your personal information to third parties except:</p>
                <ul>
                    <li>With your explicit consent</li>
                    <li>To trusted service providers who assist in operating our platform</li>
                    <li>To comply with legal requirements</li>
                    <li>To protect our rights and safety</li>
                </ul>
                
                <h2>4. Data Security</h2>
                <p>We implement appropriate security measures to protect your personal information against unauthorized access, alteration, disclosure, or destruction.</p>
                
                <h2>5. Cookies and Tracking</h2>
                <p>We use cookies and similar technologies to enhance your experience, remember your preferences, and analyze site usage.</p>
                
                <h2>6. Your Rights</h2>
                <p>You have the right to:</p>
                <ul>
                    <li>Access your personal information</li>
                    <li>Correct inaccurate information</li>
                    <li>Request deletion of your data</li>
                    <li>Opt out of marketing communications</li>
                    <li>Export your data</li>
                </ul>
                
                <h2>7. Children's Privacy</h2>
                <p>Our services are not intended for children under 13. We do not knowingly collect personal information from children under 13.</p>
                
                <h2>8. International Transfers</h2>
                <p>Your information may be transferred to and processed in countries other than your own. We ensure appropriate safeguards are in place.</p>
                
                <h2>9. Changes to This Policy</h2>
                <p>We may update this privacy policy from time to time. We will notify you of any material changes via email or website notice.</p>
                
                <h2>10. Contact Us</h2>
                <p>If you have questions about this privacy policy, please contact us at privacy@smartstudyhub.com.</p>
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