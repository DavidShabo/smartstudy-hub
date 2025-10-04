<?php
// D.S: Debug script for services page
// Developer: [Your Name] - D.S
// This script will help identify the exact error in services.php

echo "<h1>SmartStudy Hub - Services Page Debug</h1>";

// Test 1: Basic PHP
echo "<h2>Test 1: Basic PHP</h2>";
echo "<p>✅ PHP is working</p>";

// Test 2: Session
echo "<h2>Test 2: Session</h2>";
try {
    session_start();
    echo "<p>✅ Session started successfully</p>";
} catch (Exception $e) {
    echo "<p>❌ Session error: " . $e->getMessage() . "</p>";
}

// Test 3: Include config files
echo "<h2>Test 3: Include Config Files</h2>";
try {
    include_once(__DIR__ . '/../config/config.php');
    echo "<p>✅ config/config.php included successfully</p>";
} catch (Exception $e) {
    echo "<p>❌ config/config.php error: " . $e->getMessage() . "</p>";
}

try {
    include_once(__DIR__ . '/../config/database.php');
    echo "<p>✅ config/database.php included successfully</p>";
} catch (Exception $e) {
    echo "<p>❌ config/database.php error: " . $e->getMessage() . "</p>";
}

// Test 4: Database connection
echo "<h2>Test 4: Database Connection</h2>";
try {
    $services = getAllSubjects();
    echo "<p>✅ getAllSubjects() function called successfully</p>";
    echo "<p>Number of services returned: " . count($services) . "</p>";
    
    if (!empty($services)) {
        echo "<p>✅ Database is working - services found</p>";
        echo "<p>First service: " . $services[0]['name'] . "</p>";
    } else {
        echo "<p>⚠️ Database returned empty array - using fallback data</p>";
    }
} catch (Exception $e) {
    echo "<p>❌ Database error: " . $e->getMessage() . "</p>";
}

// Test 5: Fallback data
echo "<h2>Test 5: Fallback Data</h2>";
try {
    $fallback_services = [
        ['name' => 'Mathematics', 'level' => 'All Levels', 'description' => 'Expert help with algebra, calculus, geometry, and statistics. One-on-one tutoring available.', 'price' => 25.00, 'action' => 'book', 'icon' => '📐'],
        ['name' => 'Physics', 'level' => 'High School & College', 'description' => 'Master mechanics, thermodynamics, and quantum physics with experienced tutors.', 'price' => 30.00, 'action' => 'book', 'icon' => '⚡']
    ];
    echo "<p>✅ Fallback data created successfully</p>";
} catch (Exception $e) {
    echo "<p>❌ Fallback data error: " . $e->getMessage() . "</p>";
}

// Test 6: HTML generation
echo "<h2>Test 6: HTML Generation</h2>";
try {
    $test_service = ['name' => 'Test', 'level' => 'Test', 'description' => 'Test', 'price' => 25.00, 'icon' => '📚'];
    $test_html = '<div class="service"><h3>' . htmlspecialchars($test_service['name']) . '</h3></div>';
    echo "<p>✅ HTML generation test successful</p>";
} catch (Exception $e) {
    echo "<p>❌ HTML generation error: " . $e->getMessage() . "</p>";
}

// Test 7: Check for specific errors
echo "<h2>Test 7: Error Check</h2>";
$error_reporting = error_reporting();
echo "<p>Error reporting level: " . $error_reporting . "</p>";

// Test 8: File permissions
echo "<h2>Test 8: File Permissions</h2>";
if (is_readable(__DIR__ . '/../config/config.php')) {
    echo "<p>✅ config/config.php is readable</p>";
} else {
    echo "<p>❌ config/config.php is not readable</p>";
}

if (is_readable(__DIR__ . '/../config/database.php')) {
    echo "<p>✅ config/database.php is readable</p>";
} else {
    echo "<p>❌ config/database.php is not readable</p>";
}

echo "<h2>Summary:</h2>";
echo "<p>If all tests pass above, the issue might be:</p>";
echo "<ul>";
echo "<li>CSS/JS file loading issues</li>";
echo "<li>PHP syntax error in the HTML part</li>";
echo "<li>Server configuration issue</li>";
echo "<li>Memory limit or timeout</li>";
echo "</ul>";

echo "<p><strong>Upload this file and visit it to see the detailed test results.</strong></p>";
?> 