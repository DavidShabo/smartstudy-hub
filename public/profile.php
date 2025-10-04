<?php
// D.S: User profile page
session_start();
include_once(__DIR__ . '/../config/config.php');

// Redirect if not logged in
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

$user = $_SESSION['user'];

// Mock data for demonstration
$stats = [
    'sessions_completed' => 12,
    'hours_learned' => 24,
    'subjects_studied' => 5,
    'current_streak' => 7
];

$recent_sessions = [
    ['subject' => 'Mathematics', 'date' => '2024-01-15', 'duration' => '2 hours', 'tutor' => 'Dr. Smith'],
    ['subject' => 'Physics', 'date' => '2024-01-12', 'duration' => '1.5 hours', 'tutor' => 'Prof. Johnson'],
    ['subject' => 'Chemistry', 'date' => '2024-01-10', 'duration' => '1 hour', 'tutor' => 'Ms. Davis']
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="User profile - SmartStudy Hub">
    <meta name="keywords" content="profile, user, account, tutoring">
    <title>Profile - SmartStudy Hub</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/theme-dark.css">
    <link rel="stylesheet" href="../assets/css/theme-seasonal.css">
</head>
<body>
    <nav>
        <div class="container">
            <div class="nav-brand">SmartStudy Hub</div>
            <ul class="nav-links">
                <li><a href="index.php">Home</a></li>
                <li><a href="services.php">Services</a></li>
                <li><a href="settings.php">Settings</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
            <div class="theme-switcher">
                <button onclick="toggleTheme()" class="btn btn-secondary">🎨 Theme</button>
            </div>
        </div>
    </nav>

    <div class="container">
        <!-- Profile Header -->
        <div class="profile-header">
            <div class="profile-avatar">
                <div class="avatar"><?= strtoupper(substr($user['name'], 0, 1)) ?></div>
            </div>
            <div class="profile-info">
                <h1>Welcome back, <?= $user['name'] ?>!</h1>
                <p class="profile-email"><?= $user['email'] ?></p>
                <p class="member-since">Member since <?= date('F Y') ?></p>
            </div>
        </div>

        <!-- Statistics -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon">📚</div>
                <div class="stat-number"><?= $stats['sessions_completed'] ?></div>
                <div class="stat-label">Sessions Completed</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">⏰</div>
                <div class="stat-number"><?= $stats['hours_learned'] ?></div>
                <div class="stat-label">Hours Learned</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">📖</div>
                <div class="stat-number"><?= $stats['subjects_studied'] ?></div>
                <div class="stat-label">Subjects Studied</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">🔥</div>
                <div class="stat-number"><?= $stats['current_streak'] ?></div>
                <div class="stat-label">Day Streak</div>
            </div>
        </div>

        <div class="grid grid-2">
            <!-- Quick Actions -->
            <div class="card">
                <div class="card-header">
                    <h2>Quick Actions</h2>
                </div>
                <div class="quick-actions">
                    <a href="book_session.php" class="action-btn">
                        <div class="action-icon">📅</div>
                        <div class="action-text">
                            <h4>Book Session</h4>
                            <p>Schedule your next tutoring session</p>
                        </div>
                    </a>
                    <a href="orders.php" class="action-btn">
                        <div class="action-icon">📋</div>
                        <div class="action-text">
                            <h4>My Orders</h4>
                            <p>View your session history</p>
                        </div>
                    </a>
                    <a href="settings.php" class="action-btn">
                        <div class="action-icon">⚙️</div>
                        <div class="action-text">
                            <h4>Settings</h4>
                            <p>Manage your account</p>
                        </div>
                    </a>
                    <a href="help.php" class="action-btn">
                        <div class="action-icon">❓</div>
                        <div class="action-text">
                            <h4>Help Center</h4>
                            <p>Get support and guidance</p>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Recent Sessions -->
            <div class="card">
                <div class="card-header">
                    <h2>Recent Sessions</h2>
                </div>
                <div class="recent-sessions">
                    <?php foreach ($recent_sessions as $session): ?>
                        <div class="session-item">
                            <div class="session-info">
                                <h4><?= $session['subject'] ?></h4>
                                <p class="session-date"><?= date('M j, Y', strtotime($session['date'])) ?></p>
                                <p class="session-details"><?= $session['duration'] ?> with <?= $session['tutor'] ?></p>
                            </div>
                            <div class="session-status completed">Completed</div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="text-center mt-3">
                    <a href="orders.php" class="btn btn-outline">View All Sessions</a>
                </div>
            </div>
        </div>

        <!-- Learning Goals -->
        <div class="card">
            <div class="card-header">
                <h2>Learning Goals</h2>
            </div>
            <div class="goals-grid">
                <div class="goal-item">
                    <div class="goal-icon">📐</div>
                    <div class="goal-content">
                        <h4>Master Calculus</h4>
                        <div class="goal-progress">
                            <div class="progress-bar">
                                <div class="progress-fill" style="width: 75%"></div>
                            </div>
                            <span class="progress-text">75% Complete</span>
                        </div>
                    </div>
                </div>
                <div class="goal-item">
                    <div class="goal-icon">⚡</div>
                    <div class="goal-content">
                        <h4>Physics Fundamentals</h4>
                        <div class="goal-progress">
                            <div class="progress-bar">
                                <div class="progress-fill" style="width: 45%"></div>
                            </div>
                            <span class="progress-text">45% Complete</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    function toggleTheme() {
        const currentTheme = document.body.getAttribute('data-theme');
        let newTheme = 'default';
        
        if (currentTheme === 'default') {
            newTheme = 'dark';
        } else if (currentTheme === 'dark') {
            newTheme = 'seasonal';
        } else {
            newTheme = 'default';
        }
        
        document.body.setAttribute('data-theme', newTheme);
        localStorage.setItem('theme', newTheme);
    }
    
    // Load saved theme
    document.addEventListener('DOMContentLoaded', function() {
        const savedTheme = localStorage.getItem('theme');
        if (savedTheme) {
            document.body.setAttribute('data-theme', savedTheme);
        }
    });
    </script>
</body>
</html> 