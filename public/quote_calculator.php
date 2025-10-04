<?php
// D.S: Quote calculator page - Dynamic form
session_start();
include_once(__DIR__ . '/../config/config.php');
include_once(__DIR__ . '/../config/database.php');

$quote = null;
$total = 0;

if ($_POST) {
    $subject = $_POST['subject'] ?? '';
    $hours = (int)($_POST['hours'] ?? 1);
    $level = $_POST['level'] ?? 'Beginner';
    $tutor_type = $_POST['tutor_type'] ?? 'standard';
    
    // Get subject from database
    $subjects = getAllSubjects();
    $selected_subject = null;
    foreach ($subjects as $sub) {
        if ($sub['name'] === $subject) {
            $selected_subject = $sub;
            break;
        }
    }
    
    if ($selected_subject) {
        $base_price = $selected_subject['price'] ?? 25.00;
        
        // Calculate multipliers
        $level_multiplier = 1.0;
        if ($level === 'Intermediate') $level_multiplier = 1.2;
        if ($level === 'Advanced') $level_multiplier = 1.4;
        
        $tutor_multiplier = 1.0;
        if ($tutor_type === 'expert') $tutor_multiplier = 1.5;
        if ($tutor_type === 'premium') $tutor_multiplier = 2.0;
        
        $total = $base_price * $hours * $level_multiplier * $tutor_multiplier;
        
        $quote = [
            'subject' => $subject,
            'hours' => $hours,
            'level' => $level,
            'tutor_type' => $tutor_type,
            'base_price' => $base_price,
            'level_multiplier' => $level_multiplier,
            'tutor_multiplier' => $tutor_multiplier,
            'total' => $total
        ];
    }
}

$subjects = getAllSubjects();

// If database connection fails, use fallback data
if (empty($subjects)) {
    $subjects = [
        ['name' => 'Mathematics', 'price' => 25.00],
        ['name' => 'Physics', 'price' => 30.00],
        ['name' => 'Chemistry', 'price' => 28.00],
        ['name' => 'English Literature', 'price' => 22.00],
        ['name' => 'Biology', 'price' => 26.00],
        ['name' => 'Computer Science', 'price' => 35.00],
        ['name' => 'History', 'price' => 20.00],
        ['name' => 'Geography', 'price' => 18.00],
        ['name' => 'Economics', 'price' => 32.00],
        ['name' => 'French Language', 'price' => 24.00],
        ['name' => 'Art & Design', 'price' => 27.00],
        ['name' => 'Music Theory', 'price' => 29.00]
    ];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Get a quote for tutoring services - SmartStudy Hub">
    <meta name="keywords" content="quote, calculator, tutoring, pricing, SmartStudy Hub">
    <title>Quote Calculator - SmartStudy Hub</title>
    <link rel="stylesheet" href="../assets/css/base.css">
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
                <li><a href="quote_calculator.php" class="active">Get Quote</a></li>
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
        <div class="grid grid-2">
            <div class="card">
                <div class="card-header">
                    <h1>Quote Calculator</h1>
                    <p>Calculate the cost of your tutoring sessions</p>
                </div>
                <div class="card-body">
                    <form method="POST" class="form" id="quoteForm">
                        <div class="form-group">
                            <label for="subject">Subject *</label>
                            <select id="subject" name="subject" required onchange="updatePrice()">
                                <option value="">Select a subject</option>
                                <?php foreach ($subjects as $subject): ?>
                                    <option value="<?= $subject['name'] ?>" data-price="<?= $subject['price'] ?? 25.00 ?>" <?= ($_POST['subject'] ?? '') === $subject['name'] ? 'selected' : '' ?>>
                                        <?= $subject['name'] ?> - $<?= number_format($subject['price'] ?? 25.00, 2) ?>/hour
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="hours">Number of Hours *</label>
                            <input type="number" id="hours" name="hours" min="1" max="20" value="<?= $_POST['hours'] ?? 1 ?>" required onchange="updatePrice()">
                        </div>
                        
                        <div class="form-group">
                            <label for="level">Difficulty Level</label>
                            <select id="level" name="level" onchange="updatePrice()">
                                <option value="Beginner" <?= ($_POST['level'] ?? '') === 'Beginner' ? 'selected' : '' ?>>Beginner</option>
                                <option value="Intermediate" <?= ($_POST['level'] ?? '') === 'Intermediate' ? 'selected' : '' ?>>Intermediate (+20%)</option>
                                <option value="Advanced" <?= ($_POST['level'] ?? '') === 'Advanced' ? 'selected' : '' ?>>Advanced (+40%)</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="tutor_type">Tutor Type</label>
                            <select id="tutor_type" name="tutor_type" onchange="updatePrice()">
                                <option value="standard" <?= ($_POST['tutor_type'] ?? '') === 'standard' ? 'selected' : '' ?>>Standard Tutor</option>
                                <option value="expert" <?= ($_POST['tutor_type'] ?? '') === 'expert' ? 'selected' : '' ?>>Expert Tutor (+50%)</option>
                                <option value="premium" <?= ($_POST['tutor_type'] ?? '') === 'premium' ? 'selected' : '' ?>>Premium Tutor (+100%)</option>
                            </select>
                        </div>
                        
                        <div class="price-preview" id="pricePreview">
                            <p><strong>Estimated Cost: $<span id="estimatedCost">0.00</span></strong></p>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Calculate Quote</button>
                    </form>
                </div>
            </div>
            
            <?php if ($quote): ?>
            <div class="card">
                <div class="card-header">
                    <h2>Your Quote</h2>
                </div>
                <div class="card-body">
                    <div class="quote-details">
                        <div class="quote-item">
                            <span class="quote-label">Subject:</span>
                            <span class="quote-value"><?= $quote['subject'] ?></span>
                        </div>
                        <div class="quote-item">
                            <span class="quote-label">Hours:</span>
                            <span class="quote-value"><?= $quote['hours'] ?></span>
                        </div>
                        <div class="quote-item">
                            <span class="quote-label">Level:</span>
                            <span class="quote-value"><?= $quote['level'] ?></span>
                        </div>
                        <div class="quote-item">
                            <span class="quote-label">Tutor Type:</span>
                            <span class="quote-value"><?= ucfirst($quote['tutor_type']) ?></span>
                        </div>
                        <hr>
                        <div class="quote-item">
                            <span class="quote-label">Base Price:</span>
                            <span class="quote-value">$<?= number_format($quote['base_price'], 2) ?>/hour</span>
                        </div>
                        <div class="quote-item">
                            <span class="quote-label">Level Multiplier:</span>
                            <span class="quote-value"><?= $quote['level_multiplier'] ?>x</span>
                        </div>
                        <div class="quote-item">
                            <span class="quote-label">Tutor Multiplier:</span>
                            <span class="quote-value"><?= $quote['tutor_multiplier'] ?>x</span>
                        </div>
                        <hr>
                        <div class="quote-item total">
                            <span class="quote-label">Total Cost:</span>
                            <span class="quote-value">$<?= number_format($quote['total'], 2) ?></span>
                        </div>
                    </div>
                    
                    <div class="quote-actions">
                        <a href="book_session.php?subject=<?= urlencode($quote['subject']) ?>" class="btn btn-primary">Book Session</a>
                        <a href="contact.php" class="btn btn-outline">Contact Us</a>
                    </div>
                </div>
            </div>
            <?php endif; ?>
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

        function updatePrice() {
            const subjectSelect = document.getElementById('subject');
            const hoursInput = document.getElementById('hours');
            const levelSelect = document.getElementById('level');
            const tutorSelect = document.getElementById('tutor_type');
            const estimatedCostSpan = document.getElementById('estimatedCost');
            
            const selectedOption = subjectSelect.options[subjectSelect.selectedIndex];
            if (!selectedOption || !selectedOption.dataset.price) {
                estimatedCostSpan.textContent = '0.00';
                return;
            }
            
            const basePrice = parseFloat(selectedOption.dataset.price);
            const hours = parseInt(hoursInput.value) || 0;
            const level = levelSelect.value;
            const tutorType = tutorSelect.value;
            
            // Calculate multipliers
            let levelMultiplier = 1.0;
            if (level === 'Intermediate') levelMultiplier = 1.2;
            if (level === 'Advanced') levelMultiplier = 1.4;
            
            let tutorMultiplier = 1.0;
            if (tutorType === 'expert') tutorMultiplier = 1.5;
            if (tutorType === 'premium') tutorMultiplier = 2.0;
            
            const total = basePrice * hours * levelMultiplier * tutorMultiplier;
            estimatedCostSpan.textContent = total.toFixed(2);
        }

        document.addEventListener('DOMContentLoaded', function() {
            const savedTheme = localStorage.getItem('theme');
            if (savedTheme) {
                document.body.setAttribute('data-theme', savedTheme);
            }
            
            // Initialize price preview
            updatePrice();
        });
    </script>
</body>
</html> 