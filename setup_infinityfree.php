<?php
// D.S: InfinityFree Database Setup Script
// Developer: [Your Name] - D.S
// This script helps you configure your database for InfinityFree hosting

echo "<h1>SmartStudy Hub - InfinityFree Database Setup</h1>";
echo "<p>Follow these steps to set up your database on InfinityFree:</p>";

echo "<h2>Step 1: Get Your Database Credentials</h2>";
echo "<ol>";
echo "<li>Login to your InfinityFree control panel</li>";
echo "<li>Go to 'MySQL Manager'</li>";
echo "<li>Create a new database (e.g., 'yourusername_smartstudy')</li>";
echo "<li>Note down your database credentials:</li>";
echo "<ul>";
echo "<li>Database Host: sql.infinityfree.com</li>";
echo "<li>Database Name: yourusername_smartstudy</li>";
echo "<li>Database Username: yourusername_smartstudy</li>";
echo "<li>Database Password: (the password you created)</li>";
echo "</ul>";
echo "</ol>";

echo "<h2>Step 2: Update Configuration Files</h2>";
echo "<p>You need to update these files with your actual database credentials:</p>";
echo "<ul>";
echo "<li><strong>config/config.php</strong> - Update the database settings</li>";
echo "<li><strong>config/database.php</strong> - Update the PDO database settings</li>";
echo "</ul>";

echo "<h2>Step 3: Import Database Schema</h2>";
echo "<ol>";
echo "<li>Go to 'phpMyAdmin' in your InfinityFree control panel</li>";
echo "<li>Select your database</li>";
echo "<li>Go to 'Import' tab</li>";
echo "<li>Upload the file: <strong>sql/init.sql</strong></li>";
echo "<li>Click 'Go' to import the database schema</li>";
echo "</ol>";

echo "<h2>Step 4: Test Your Connection</h2>";
echo "<p>After updating the credentials, visit your website to test if the database connection works.</p>";

echo "<h2>Current Configuration (Needs to be Updated)</h2>";
echo "<p><strong>config/config.php:</strong></p>";
echo "<pre>";
echo "Host: sql.infinityfree.com\n";
echo "User: yourusername_smartstudy (REPLACE WITH YOUR ACTUAL USERNAME)\n";
echo "Password: your_database_password (REPLACE WITH YOUR ACTUAL PASSWORD)\n";
echo "Database: yourusername_smartstudy (REPLACE WITH YOUR ACTUAL DATABASE NAME)\n";
echo "</pre>";

echo "<h2>Important Notes:</h2>";
echo "<ul>";
echo "<li>Replace 'yourusername' with your actual InfinityFree username</li>";
echo "<li>Use the exact database name, username, and password from your InfinityFree control panel</li>";
echo "<li>After setup, delete this file for security</li>";
echo "<li>If you get database errors, double-check your credentials</li>";
echo "</ul>";

echo "<p><strong>Once you've updated the credentials, your services page should work correctly!</strong></p>";
?> 