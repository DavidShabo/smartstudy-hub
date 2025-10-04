<?php
// D.S: Minimal test to isolate the 500 error
echo "Step 1: Basic PHP works<br>";

try {
    session_start();
    echo "Step 2: Session started<br>";
} catch (Exception $e) {
    echo "Step 2 ERROR: " . $e->getMessage() . "<br>";
}

try {
    include_once(__DIR__ . '/../config/config.php');
    echo "Step 3: config.php included<br>";
} catch (Exception $e) {
    echo "Step 3 ERROR: " . $e->getMessage() . "<br>";
}

try {
    include_once(__DIR__ . '/../config/database.php');
    echo "Step 4: database.php included<br>";
} catch (Exception $e) {
    echo "Step 4 ERROR: " . $e->getMessage() . "<br>";
}

try {
    $services = getAllSubjects();
    echo "Step 5: getAllSubjects() called - returned " . count($services) . " items<br>";
} catch (Exception $e) {
    echo "Step 5 ERROR: " . $e->getMessage() . "<br>";
}

echo "Step 6: Test completed successfully<br>";
?> 