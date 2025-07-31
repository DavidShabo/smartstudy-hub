<?php
// SmartStudy Hub - Header Component
// Handles site-wide header with SEO, navigation, and theme switching

session_start();
include_once(__DIR__ . '/../config/config.php');

// Get current page for navigation highlighting
$current_page = basename($_SERVER['PHP_SELF'], '.php');

// Get site settings
$site_name = 'SmartStudy Hub';
$site_description = 'Professional online tutoring platform connecting students with expert tutors';
$site_keywords = 'tutoring, online education, homework help, academic support, math tutor, science tutor';

// Get theme preference
$theme = isset($_COOKIE['site_theme']) ? $_COOKIE['site_theme'] : 'default';

// Get user info if logged in
$user = isset($_SESSION['user']) ? $_SESSION['user'] : null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo htmlspecialchars($site_description); ?>">
    <meta name="keywords" content="<?php echo htmlspecialchars($site_keywords); ?>">
    <meta name="author" content="SmartStudy Hub">
    <meta name="robots" content="index, follow">
    
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="<?php echo htmlspecialchars($site_name); ?>">
    <meta property="og:description" content="<?php echo htmlspecialchars($site_description); ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>">
    <meta property="og:image" content="/assets/images/logo.png">
    
    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo htmlspecialchars($site_name); ?>">
    <meta name="twitter:description" content="<?php echo htmlspecialchars($site_description); ?>">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/assets/images/favicon.ico">
    <link rel="apple-touch-icon" href="/assets/images/logo.png">
    
    <title><?php echo htmlspecialchars($site_name); ?> - Online Tutoring Platform</title>
    
    <!-- CSS Files -->
    <link rel="stylesheet" href="/assets/css/base.css">
    <link rel="stylesheet" href="/assets/css/theme-<?php echo $theme; ?>.css">
    
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="theme-<?php echo $theme; ?>">
    <!-- Header -->
    <header class="site-header">
        <div class="container">
            <div class="header-content">
                <!-- Logo -->
                <div class="logo">
                    <a href="/public/index.php">
                        <img src="/assets/images/logo.png" alt="SmartStudy Hub Logo" class="logo-img">
                        <span class="logo-text">SmartStudy Hub</span>
                    </a>
                </div>
                
                <!-- Navigation -->
                <nav class="main-nav">
                    <ul class="nav-list">
                        <li class="nav-item <?php echo $current_page === 'index' ? 'active' : ''; ?>">
                            <a href="/public/index.php" class="nav-link">
                                <i class="fas fa-home"></i> Home
                            </a>
                        </li>
                        <li class="nav-item <?php echo $current_page === 'services' ? 'active' : ''; ?>">
                            <a href="/public/services.php" class="nav-link">
                                <i class="fas fa-graduation-cap"></i> Services
                            </a>
                        </li>
                        <li class="nav-item <?php echo $current_page === 'questions' ? 'active' : ''; ?>">
                            <a href="/public/questions.php" class="nav-link">
                                <i class="fas fa-question-circle"></i> Q&A
                            </a>
                        </li>
                        <li class="nav-item <?php echo $current_page === 'about' ? 'active' : ''; ?>">
                            <a href="/public/about.php" class="nav-link">
                                <i class="fas fa-info-circle"></i> About
                            </a>
                        </li>
                        <li class="nav-item <?php echo $current_page === 'contact' ? 'active' : ''; ?>">
                            <a href="/public/contact.php" class="nav-link">
                                <i class="fas fa-envelope"></i> Contact
                            </a>
                        </li>
                    </ul>
                </nav>
                
                <!-- User Menu -->
                <div class="user-menu">
                    <?php if ($user): ?>
                        <div class="user-dropdown">
                            <button class="user-btn">
                                <i class="fas fa-user-circle"></i>
                                <span><?php echo htmlspecialchars($user['first_name']); ?></span>
                                <i class="fas fa-chevron-down"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="/public/profile.php"><i class="fas fa-user"></i> Profile</a></li>
                                <li><a href="/public/orders.php"><i class="fas fa-list"></i> My Orders</a></li>
                                <li><a href="/public/settings.php"><i class="fas fa-cog"></i> Settings</a></li>
                                <?php if ($user['role'] === 'admin'): ?>
                                    <li><a href="/admin/dashboard.php"><i class="fas fa-tools"></i> Admin Panel</a></li>
                                <?php endif; ?>
                                <li><a href="/public/logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                            </ul>
                        </div>
                    <?php else: ?>
                        <div class="auth-buttons">
                            <a href="/public/login.php" class="btn btn-outline">Login</a>
                            <a href="/public/register.php" class="btn btn-primary">Register</a>
                        </div>
                    <?php endif; ?>
                </div>
                
                <!-- Mobile Menu Toggle -->
                <button class="mobile-menu-toggle" aria-label="Toggle mobile menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
        </div>
    </header>
    
    <!-- Theme Switcher -->
    <div class="theme-switcher">
        <button class="theme-btn" data-theme="default" title="Default Theme">
            <i class="fas fa-sun"></i>
        </button>
        <button class="theme-btn" data-theme="dark" title="Dark Theme">
            <i class="fas fa-moon"></i>
        </button>
        <button class="theme-btn" data-theme="seasonal" title="Seasonal Theme">
            <i class="fas fa-leaf"></i>
        </button>
    </div>
    
    <!-- Main Content Container -->
    <main class="main-content">
