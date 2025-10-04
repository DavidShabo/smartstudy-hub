<?php
// D.S: Simplified services page for testing
session_start();
include_once(__DIR__ . '/../config/config.php');
include_once(__DIR__ . '/../config/database.php');

// Get services from database
$services = getAllSubjects();

// If database connection fails, use fallback data
if (empty($services)) {
    $services = [
        ['name' => 'Mathematics', 'level' => 'All Levels', 'description' => 'Expert help with algebra, calculus, geometry, and statistics.', 'price' => 25.00, 'icon' => '📐'],
        ['name' => 'Physics', 'level' => 'High School & College', 'description' => 'Master mechanics, thermodynamics, and quantum physics.', 'price' => 30.00, 'icon' => '⚡'],
        ['name' => 'Chemistry', 'level' => 'All Levels', 'description' => 'Learn organic chemistry, biochemistry, and laboratory techniques.', 'price' => 28.00, 'icon' => '🧪']
    ];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services - SmartStudy Hub</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="container">
        <h1>Our Services</h1>
        <p>Choose from our comprehensive range of tutoring services.</p>
        
        <div class="services">
            <?php foreach ($services as $service): ?>
                <div class="service">
                    <div class="service-icon"><?= $service['icon'] ?? '📚' ?></div>
                    <h3><?= $service['name'] ?></h3>
                    <p>Level: <?= $service['level'] ?></p>
                    <p><?= $service['description'] ?></p>
                    <p>Price: $<?= number_format($service['price'] ?? 25.00, 2) ?>/hour</p>
                    <a href="book_session.php?subject=<?= urlencode($service['name']) ?>" class="btn btn-primary">Book Session</a>
                </div>
            <?php endforeach; ?>
        </div>
        
        <p><a href="index.php">Back to Home</a></p>
    </div>
</body>
</html> 