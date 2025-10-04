<?php
// D.S: Database connection test script
// Developer: [Your Name] - D.S
// This script will help debug the database connection issue

echo "<h1>SmartStudy Hub - Database Connection Test</h1>";

// Test 1: Basic PHP
echo "<h2>Test 1: PHP is working</h2>";
echo "<p>✅ PHP is working correctly</p>";

// Test 2: Check if database files exist
echo "<h2>Test 2: Check configuration files</h2>";
if (file_exists('config/config.php')) {
    echo "<p>✅ config/config.php exists</p>";
} else {
    echo "<p>❌ config/config.php missing</p>";
}

if (file_exists('config/database.php')) {
    echo "<p>✅ config/database.php exists</p>";
} else {
    echo "<p>❌ config/database.php missing</p>";
}

// Test 3: Test mysqli connection
echo "<h2>Test 3: MySQLi Connection Test</h2>";
try {
    include_once('config/config.php');
    if (isset($conn) && $conn) {
        echo "<p>✅ MySQLi connection successful</p>";
        
        // Test if database exists
        $result = mysqli_query($conn, "SHOW TABLES");
        if ($result) {
            echo "<p>✅ Database exists and is accessible</p>";
            echo "<p>Tables found:</p><ul>";
            while ($row = mysqli_fetch_array($result)) {
                echo "<li>" . $row[0] . "</li>";
            }
            echo "</ul>";
        } else {
            echo "<p>❌ Database exists but no tables found</p>";
        }
    } else {
        echo "<p>❌ MySQLi connection failed</p>";
    }
} catch (Exception $e) {
    echo "<p>❌ MySQLi Error: " . $e->getMessage() . "</p>";
}

// Test 4: Test PDO connection
echo "<h2>Test 4: PDO Connection Test</h2>";
try {
    include_once('config/database.php');
    
    $pdo = getDBConnection();
    if ($pdo) {
        echo "<p>✅ PDO connection successful</p>";
        
        // Test if subjects table exists
        $stmt = $pdo->query("SELECT COUNT(*) FROM subjects");
        if ($stmt) {
            $count = $stmt->fetchColumn();
            echo "<p>✅ Subjects table exists with " . $count . " records</p>";
        } else {
            echo "<p>❌ Subjects table doesn't exist or is empty</p>";
        }
    } else {
        echo "<p>❌ PDO connection failed</p>";
    }
} catch (Exception $e) {
    echo "<p>❌ PDO Error: " . $e->getMessage() . "</p>";
}

// Test 5: Check if database schema is imported
echo "<h2>Test 5: Database Schema Check</h2>";
try {
    $pdo = getDBConnection();
    if ($pdo) {
        // Check if subjects table exists
        $stmt = $pdo->query("SHOW TABLES LIKE 'subjects'");
        if ($stmt->rowCount() > 0) {
            echo "<p>✅ Subjects table exists</p>";
            
            // Check if users table exists
            $stmt = $pdo->query("SHOW TABLES LIKE 'users'");
            if ($stmt->rowCount() > 0) {
                echo "<p>✅ Users table exists</p>";
            } else {
                echo "<p>❌ Users table missing - need to import database schema</p>";
            }
        } else {
            echo "<p>❌ Subjects table missing - need to import database schema</p>";
        }
    }
} catch (Exception $e) {
    echo "<p>❌ Schema check error: " . $e->getMessage() . "</p>";
}

echo "<h2>Next Steps:</h2>";
echo "<ol>";
echo "<li>If you see connection errors, check your database credentials</li>";
echo "<li>If tables are missing, import the sql/init.sql file in phpMyAdmin</li>";
echo "<li>If everything looks good, the issue might be in the services.php file</li>";
echo "</ol>";

echo "<p><strong>Upload this file to your hosting and visit it to see the test results.</strong></p>";
?> 