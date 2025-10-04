<?php
// D.S: Help redirect page
// Developer: [Your Name] - D.S
// This file redirects to the help directory since .htaccess might not work on InfinityFree

// Check if a specific help page is requested
$page = $_GET['page'] ?? 'index';

// Valid help pages
$valid_pages = ['index', 'getting-started', 'account', 'booking', 'admin'];

if (!in_array($page, $valid_pages)) {
    $page = 'index';
}

// Redirect to the appropriate help page
$help_file = "help/{$page}.php";

if (file_exists($help_file)) {
    include_once($help_file);
} else {
    // Fallback to main help page
    include_once('help/index.php');
}
?> 