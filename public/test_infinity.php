<?php
// D.S: InfinityFree Debug Test Script
// Developer: [Your Name] - D.S
// This script will help identify issues on InfinityFree hosting

echo "<h1>SmartStudy Hub - InfinityFree Debug Test</h1>";
echo "<style>
    body { font-family: Arial, sans-serif; margin: 20px; }
    .success { color: green; }
    .error { color: red; }
    .warning { color: orange; }
    .info { color: blue; }
    .test-section { margin: 20px 0; padding: 10px; border: 1px solid #ccc; }
</style>";

// Test 1: Basic PHP
echo "<div class='test-section'>";
echo "<h2>✅ Test 1: PHP is working</h2>";
echo "<p class='success'>PHP version: " . phpversion() . "</p>";
echo "<p class='success'>Current time: " . date('Y-m-d H:i:s') . "</p>";
echo "</div>";

// Test 2: File system
echo "<div class='test-section'>";
echo "<h2>📁 Test 2: File System Access</h2>";
$config_file = __DIR__ . '/../config/config.php';
$db_file = __DIR__ . '/../config/database.php';
$css_file = __DIR__ . '/../assets/css/base.css';

echo "<p class='" . (file_exists($config_file) ? 'success' : 'error') . "'>Config file: " . (file_exists($config_file) ? '✅ Found' : '❌ Missing') . "</p>";
echo "<p class='" . (file_exists($db_file) ? 'success' : 'error') . "'>Database file: " . (file_exists($db_file) ? '✅ Found' : '❌ Missing') . "</p>";
echo "<p class='" . (file_exists($css_file) ? 'success' : 'error') . "'>CSS file: " . (file_exists($css_file) ? '✅ Found' : '❌ Missing') . "</p>";
echo "</div>";

// Test 3: Include files
echo "<div class='test-section'>";
echo "<h2>📦 Test 3: Include Files</h2>";
try {
    include_once(__DIR__ . '/../config/config.php');
    echo "<p class='success'>✅ Config file included successfully</p>";
} catch (Exception $e) {
    echo "<p class='error'>❌ Config file error: " . $e->getMessage() . "</p>";
}

try {
    include_once(__DIR__ . '/../config/database.php');
    echo "<p class='success'>✅ Database file included successfully</p>";
} catch (Exception $e) {
    echo "<p class='error'>❌ Database file error: " . $e->getMessage() . "</p>";
}
echo "</div>";

// Test 4: Database connection
echo "<div class='test-section'>";
echo "<h2>🗄️ Test 4: Database Connection</h2>";
if (function_exists('getDBConnection')) {
    $pdo = getDBConnection();
    if ($pdo) {
        echo "<p class='success'>✅ Database connection successful</p>";
        
        // Test query
        try {
            $stmt = $pdo->query("SELECT COUNT(*) as count FROM subjects");
            $result = $stmt->fetch();
            echo "<p class='success'>✅ Subjects table: " . $result['count'] . " records found</p>";
        } catch (Exception $e) {
            echo "<p class='error'>❌ Query error: " . $e->getMessage() . "</p>";
        }
    } else {
        echo "<p class='error'>❌ Database connection failed</p>";
    }
} else {
    echo "<p class='error'>❌ getDBConnection function not found</p>";
}
echo "</div>";

// Test 5: Error reporting
echo "<div class='test-section'>";
echo "<h2>🐛 Test 5: Error Reporting</h2>";
echo "<p class='info'>Error reporting level: " . error_reporting() . "</p>";
echo "<p class='info'>Display errors: " . (ini_get('display_errors') ? 'On' : 'Off') . "</p>";
echo "<p class='info'>Log errors: " . (ini_get('log_errors') ? 'On' : 'Off') . "</p>";
echo "</div>";

// Test 6: Services page simulation
echo "<div class='test-section'>";
echo "<h2>🛠️ Test 6: Services Page Simulation</h2>";
if (function_exists('getAllSubjects')) {
    $services = getAllSubjects();
    if (empty($services)) {
        echo "<p class='warning'>⚠️ No services found in database, using fallback data</p>";
        $services = [
            ['name' => 'Mathematics', 'level' => 'All Levels', 'description' => 'Test description', 'price' => 25.00, 'icon' => '📐'],
            ['name' => 'Physics', 'level' => 'High School', 'description' => 'Test description', 'price' => 30.00, 'icon' => '⚡']
        ];
    }
    
    echo "<p class='success'>✅ Services loaded: " . count($services) . " services</p>";
    
    // Test price access
    foreach ($services as $service) {
        $price = $service['price'] ?? 25.00;
        echo "<p class='info'>Service: " . $service['name'] . " - Price: $" . number_format($price, 2) . "</p>";
    }
} else {
    echo "<p class='error'>❌ getAllSubjects function not found</p>";
}
echo "</div>";

// Test 7: CSS file content
echo "<div class='test-section'>";
echo "<h2>🎨 Test 7: CSS File Check</h2>";
if (file_exists($css_file)) {
    $css_content = file_get_contents($css_file);
    $css_size = strlen($css_content);
    echo "<p class='success'>✅ CSS file found, size: " . $css_size . " bytes</p>";
    if ($css_size < 100) {
        echo "<p class='warning'>⚠️ CSS file seems very small, might be empty</p>";
    }
} else {
    echo "<p class='error'>❌ CSS file not found</p>";
}
echo "</div>";

echo "<div class='test-section'>";
echo "<h2>📋 Summary</h2>";
echo "<p>Upload this file to your InfinityFree hosting and visit it to see detailed test results.</p>";
echo "<p>Common issues on InfinityFree:</p>";
echo "<ul>";
echo "<li>Database credentials might be different</li>";
echo "<li>File permissions might be restricted</li>";
echo "<li>PHP error reporting might be disabled</li>";
echo "<li>Some PHP functions might be disabled</li>";
echo "</ul>";
echo "</div>";
?> 