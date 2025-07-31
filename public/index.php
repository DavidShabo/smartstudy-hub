<?php
// SmartStudy Hub - Homepage
// Comprehensive landing page with multimedia and interactive features

session_start();
include_once(__DIR__ . '/../config/config.php');

// Get featured services
$featuredServices = [];
$sql = "SELECT * FROM services WHERE status = 'active' ORDER BY RAND() LIMIT 6";
$result = $conn->query($sql);
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $featuredServices[] = $row;
    }
}

// Get testimonials
$testimonials = [
    [
        'name' => 'Sarah Johnson',
        'role' => 'Student',
        'content' => 'SmartStudy Hub helped me ace my calculus exam! The tutors are amazing and very patient.',
        'rating' => 5,
        'avatar' => '/assets/images/avatars/sarah.jpg'
    ],
    [
        'name' => 'Michael Chen',
        'role' => 'Parent',
        'content' => 'My daughter\'s grades improved significantly after just a few sessions. Highly recommended!',
        'rating' => 5,
        'avatar' => '/assets/images/avatars/michael.jpg'
    ],
    [
        'name' => 'Dr. Emily Rodriguez',
        'role' => 'Tutor',
        'content' => 'I love teaching through this platform. The students are motivated and the tools are excellent.',
        'rating' => 5,
        'avatar' => '/assets/images/avatars/emily.jpg'
    ]
];

// Include header
include_once(__DIR__ . '/../includes/header.php');
?>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="hero-content">
            <div class="hero-text">
                <h1 class="hero-title">
                    Master Your Studies with 
                    <span class="highlight">Expert Tutors</span>
                </h1>
                <p class="hero-description">
                    Connect with qualified tutors for personalized learning experiences. 
                    From mathematics to languages, we've got you covered with 20+ subjects 
                    and flexible scheduling options.
                </p>
                <div class="hero-buttons">
                    <a href="/public/services.php" class="btn btn-primary btn-lg">
                        <i class="fas fa-graduation-cap"></i> Browse Services
                    </a>
                    <a href="/public/register.php" class="btn btn-outline btn-lg">
                        <i class="fas fa-user-plus"></i> Get Started
                    </a>
                </div>
                <div class="hero-stats">
                    <div class="stat">
                        <span class="stat-number">500+</span>
                        <span class="stat-label">Students Helped</span>
                    </div>
                    <div class="stat">
                        <span class="stat-number">50+</span>
                        <span class="stat-label">Expert Tutors</span>
                    </div>
                    <div class="stat">
                        <span class="stat-number">20+</span>
                        <span class="stat-label">Subjects</span>
                    </div>
                </div>
            </div>
            <div class="hero-media">
                <div class="hero-video">
                    <video controls poster="/assets/images/video-poster.jpg">
                        <source src="/assets/media/intro.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
                <div class="hero-image">
                    <img src="/assets/images/hero-students.jpg" alt="Students learning online" class="hero-img">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="features-section">
    <div class="container">
        <div class="section-header text-center">
            <h2>Why Choose SmartStudy Hub?</h2>
            <p>Discover the features that make us the preferred choice for online tutoring</p>
        </div>
        
        <div class="grid grid-3">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-users"></i>
                </div>
                <h3>Expert Tutors</h3>
                <p>Learn from qualified professionals with years of teaching experience in their respective fields.</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-clock"></i>
                </div>
                <h3>Flexible Scheduling</h3>
                <p>Book sessions at your convenience with 24/7 availability and multiple time slots.</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-laptop"></i>
                </div>
                <h3>Interactive Learning</h3>
                <p>Engage in real-time video sessions with screen sharing and digital whiteboards.</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <h3>Progress Tracking</h3>
                <p>Monitor your learning progress with detailed reports and performance analytics.</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3>Secure Platform</h3>
                <p>Your data and sessions are protected with enterprise-grade security measures.</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-headset"></i>
                </div>
                <h3>24/7 Support</h3>
                <p>Get help whenever you need it with our round-the-clock customer support team.</p>
            </div>
        </div>
    </div>
</section>

<!-- Services Showcase -->
<section class="services-section">
    <div class="container">
        <div class="section-header text-center">
            <h2>Popular Tutoring Services</h2>
            <p>Explore our most requested subjects and find the perfect tutor for your needs</p>
        </div>
        
        <div class="grid grid-3">
            <?php foreach ($featuredServices as $service): ?>
            <div class="service-card" data-service-id="<?php echo $service['id']; ?>">
                <div class="service-image">
                    <img src="/assets/images/services/<?php echo strtolower(str_replace(' ', '-', $service['name'])); ?>.jpg" 
                         alt="<?php echo htmlspecialchars($service['name']); ?>"
                         onerror="this.src='/assets/images/services/default.jpg'">
                </div>
                <div class="service-content">
                    <h3><?php echo htmlspecialchars($service['name']); ?></h3>
                    <p><?php echo htmlspecialchars($service['description']); ?></p>
                    <div class="service-meta">
                        <span class="service-price">$<?php echo number_format($service['price'], 2); ?>/hour</span>
                        <span class="service-category"><?php echo htmlspecialchars($service['category']); ?></span>
                    </div>
                    <a href="/public/service.php?id=<?php echo $service['id']; ?>" class="btn btn-primary">
                        Learn More
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        
        <div class="text-center mt-4">
            <a href="/public/services.php" class="btn btn-outline btn-lg">
                <i class="fas fa-th-list"></i> View All Services
            </a>
        </div>
    </div>
</section>

<!-- Interactive Map Section -->
<section class="map-section">
    <div class="container">
        <div class="section-header text-center">
            <h2>Our Global Reach</h2>
            <p>Connect with tutors and students from around the world</p>
        </div>
        
        <div class="map-container">
            <div id="interactive-map" class="map"></div>
            <div class="map-stats">
                <div class="map-stat">
                    <i class="fas fa-globe"></i>
                    <span class="stat-number">25+</span>
                    <span class="stat-label">Countries</span>
                </div>
                <div class="map-stat">
                    <i class="fas fa-users"></i>
                    <span class="stat-number">1000+</span>
                    <span class="stat-label">Active Users</span>
                </div>
                <div class="map-stat">
                    <i class="fas fa-clock"></i>
                    <span class="stat-number">24/7</span>
                    <span class="stat-label">Availability</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="testimonials-section">
    <div class="container">
        <div class="section-header text-center">
            <h2>What Our Users Say</h2>
            <p>Real feedback from students and tutors who use our platform</p>
        </div>
        
        <div class="testimonials-grid">
            <?php foreach ($testimonials as $testimonial): ?>
            <div class="testimonial-card">
                <div class="testimonial-header">
                    <img src="<?php echo $testimonial['avatar']; ?>" 
                         alt="<?php echo htmlspecialchars($testimonial['name']); ?>"
                         class="testimonial-avatar"
                         onerror="this.src='/assets/images/avatars/default.jpg'">
                    <div class="testimonial-info">
                        <h4><?php echo htmlspecialchars($testimonial['name']); ?></h4>
                        <span class="testimonial-role"><?php echo htmlspecialchars($testimonial['role']); ?></span>
                        <div class="testimonial-rating">
                            <?php for ($i = 1; $i <= 5; $i++): ?>
                                <i class="fas fa-star <?php echo $i <= $testimonial['rating'] ? 'active' : ''; ?>"></i>
                            <?php endfor; ?>
                        </div>
                    </div>
                </div>
                <p class="testimonial-content"><?php echo htmlspecialchars($testimonial['content']); ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Data Visualization Section -->
<section class="stats-section">
    <div class="container">
        <div class="section-header text-center">
            <h2>Platform Statistics</h2>
            <p>See how SmartStudy Hub is helping students succeed</p>
        </div>
        
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <div class="stat-content">
                    <h3 class="stat-number" data-target="1500">0</h3>
                    <p class="stat-label">Students Enrolled</p>
                </div>
                <div class="progress-bar">
                    <div class="progress-fill" data-percentage="85"></div>
                </div>
            </div>
            
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-chalkboard-teacher"></i>
                </div>
                <div class="stat-content">
                    <h3 class="stat-number" data-target="75">0</h3>
                    <p class="stat-label">Expert Tutors</p>
                </div>
                <div class="progress-bar">
                    <div class="progress-fill" data-percentage="92"></div>
                </div>
            </div>
            
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-book"></i>
                </div>
                <div class="stat-content">
                    <h3 class="stat-number" data-target="25">0</h3>
                    <p class="stat-label">Subjects Covered</p>
                </div>
                <div class="progress-bar">
                    <div class="progress-fill" data-percentage="100"></div>
                </div>
            </div>
            
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-star"></i>
                </div>
                <div class="stat-content">
                    <h3 class="stat-number" data-target="98">0</h3>
                    <p class="stat-label">Satisfaction Rate</p>
                </div>
                <div class="progress-bar">
                    <div class="progress-fill" data-percentage="98"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <div class="container">
        <div class="cta-content text-center">
            <h2>Ready to Start Your Learning Journey?</h2>
            <p>Join thousands of students who are already achieving their academic goals with SmartStudy Hub</p>
            <div class="cta-buttons">
                <a href="/public/register.php" class="btn btn-primary btn-lg">
                    <i class="fas fa-rocket"></i> Get Started Today
                </a>
                <a href="/public/contact.php" class="btn btn-outline btn-lg">
                    <i class="fas fa-phone"></i> Contact Us
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Audio/Video Section -->
<section class="media-section">
    <div class="container">
        <div class="section-header text-center">
            <h2>Learn More About SmartStudy Hub</h2>
            <p>Watch our introduction video and listen to our podcast</p>
        </div>
        
        <div class="media-grid">
            <div class="media-card">
                <h3><i class="fas fa-play-circle"></i> Platform Introduction</h3>
                <video controls class="media-video">
                    <source src="/assets/media/walkthrough.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <p>Learn how to navigate our platform and make the most of your tutoring sessions.</p>
            </div>
            
            <div class="media-card">
                <h3><i class="fas fa-podcast"></i> Education Podcast</h3>
                <audio controls class="media-audio">
                    <source src="/assets/media/podcast.mp3" type="audio/mpeg">
                    Your browser does not support the audio element.
                </audio>
                <p>Listen to our latest podcast episode about effective study techniques and learning strategies.</p>
            </div>
        </div>
    </div>
</section>

<style>
/* Hero Section */
.hero-section {
    background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
    color: var(--white);
    padding: var(--spacing-2xl) 0;
    position: relative;
    overflow: hidden;
}

.hero-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-image: 
        radial-gradient(circle at 20% 80%, rgba(255,255,255,0.1) 0%, transparent 50%),
        radial-gradient(circle at 80% 20%, rgba(255,255,255,0.1) 0%, transparent 50%);
}

.hero-content {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: var(--spacing-2xl);
    align-items: center;
    position: relative;
    z-index: 1;
}

.hero-title {
    font-size: var(--font-size-4xl);
    font-weight: 700;
    margin-bottom: var(--spacing-lg);
    line-height: 1.2;
}

.highlight {
    color: var(--accent-color);
    text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
}

.hero-description {
    font-size: var(--font-size-lg);
    margin-bottom: var(--spacing-xl);
    opacity: 0.9;
    line-height: 1.6;
}

.hero-buttons {
    display: flex;
    gap: var(--spacing-md);
    margin-bottom: var(--spacing-xl);
}

.hero-stats {
    display: flex;
    gap: var(--spacing-xl);
}

.stat {
    text-align: center;
}

.stat-number {
    display: block;
    font-size: var(--font-size-2xl);
    font-weight: 700;
    color: var(--accent-color);
}

.stat-label {
    font-size: var(--font-size-sm);
    opacity: 0.8;
}

.hero-media {
    position: relative;
}

.hero-video {
    border-radius: var(--radius-lg);
    overflow: hidden;
    box-shadow: var(--shadow-xl);
    margin-bottom: var(--spacing-lg);
}

.hero-video video {
    width: 100%;
    height: auto;
}

.hero-image {
    border-radius: var(--radius-lg);
    overflow: hidden;
    box-shadow: var(--shadow-lg);
}

.hero-img {
    width: 100%;
    height: auto;
}

/* Features Section */
.features-section {
    padding: var(--spacing-2xl) 0;
    background-color: var(--bg-secondary);
}

.section-header {
    margin-bottom: var(--spacing-2xl);
}

.section-header h2 {
    font-size: var(--font-size-3xl);
    margin-bottom: var(--spacing-md);
}

.section-header p {
    font-size: var(--font-size-lg);
    color: var(--text-secondary);
}

.feature-card {
    text-align: center;
    padding: var(--spacing-xl);
    border-radius: var(--radius-lg);
    transition: all var(--transition-normal);
}

.feature-icon {
    width: 80px;
    height: 80px;
    margin: 0 auto var(--spacing-lg);
    background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: var(--font-size-2xl);
    color: var(--white);
}

.feature-card h3 {
    margin-bottom: var(--spacing-md);
    color: var(--text-primary);
}

.feature-card p {
    color: var(--text-secondary);
    line-height: 1.6;
}

/* Services Section */
.services-section {
    padding: var(--spacing-2xl) 0;
}

.service-card {
    border-radius: var(--radius-lg);
    overflow: hidden;
    transition: all var(--transition-normal);
    cursor: pointer;
}

.service-image {
    height: 200px;
    overflow: hidden;
}

.service-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform var(--transition-normal);
}

.service-content {
    padding: var(--spacing-lg);
}

.service-content h3 {
    margin-bottom: var(--spacing-sm);
    color: var(--text-primary);
}

.service-content p {
    color: var(--text-secondary);
    margin-bottom: var(--spacing-md);
    line-height: 1.6;
}

.service-meta {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: var(--spacing-md);
}

.service-price {
    font-weight: 600;
    color: var(--primary-color);
    font-size: var(--font-size-lg);
}

.service-category {
    background-color: var(--gray-100);
    color: var(--text-secondary);
    padding: var(--spacing-xs) var(--spacing-sm);
    border-radius: var(--radius-sm);
    font-size: var(--font-size-sm);
}

/* Map Section */
.map-section {
    padding: var(--spacing-2xl) 0;
    background-color: var(--bg-secondary);
}

.map-container {
    position: relative;
    border-radius: var(--radius-lg);
    overflow: hidden;
    box-shadow: var(--shadow-lg);
}

.map {
    height: 400px;
    background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--white);
    font-size: var(--font-size-xl);
}

.map-stats {
    position: absolute;
    bottom: var(--spacing-lg);
    left: var(--spacing-lg);
    display: flex;
    gap: var(--spacing-lg);
}

.map-stat {
    background-color: rgba(255,255,255,0.9);
    padding: var(--spacing-sm) var(--spacing-md);
    border-radius: var(--radius-md);
    text-align: center;
    color: var(--text-primary);
}

.map-stat i {
    color: var(--primary-color);
    margin-bottom: var(--spacing-xs);
}

/* Testimonials Section */
.testimonials-section {
    padding: var(--spacing-2xl) 0;
}

.testimonials-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: var(--spacing-lg);
}

.testimonial-card {
    padding: var(--spacing-lg);
    border-radius: var(--radius-lg);
    transition: all var(--transition-normal);
}

.testimonial-header {
    display: flex;
    align-items: center;
    margin-bottom: var(--spacing-md);
}

.testimonial-avatar {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    margin-right: var(--spacing-md);
    object-fit: cover;
}

.testimonial-info h4 {
    margin-bottom: var(--spacing-xs);
    color: var(--text-primary);
}

.testimonial-role {
    color: var(--text-secondary);
    font-size: var(--font-size-sm);
}

.testimonial-rating {
    margin-top: var(--spacing-xs);
}

.testimonial-rating .fa-star {
    color: var(--gray-300);
    font-size: var(--font-size-sm);
}

.testimonial-rating .fa-star.active {
    color: var(--accent-color);
}

.testimonial-content {
    color: var(--text-secondary);
    line-height: 1.6;
    font-style: italic;
}

/* Stats Section */
.stats-section {
    padding: var(--spacing-2xl) 0;
    background-color: var(--bg-secondary);
}

.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: var(--spacing-lg);
}

.stat-card {
    background: var(--white);
    padding: var(--spacing-lg);
    border-radius: var(--radius-lg);
    text-align: center;
    box-shadow: var(--shadow-sm);
    transition: all var(--transition-normal);
}

.stat-card:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-lg);
}

.stat-icon {
    width: 60px;
    height: 60px;
    margin: 0 auto var(--spacing-md);
    background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: var(--font-size-xl);
    color: var(--white);
}

.stat-number {
    font-size: var(--font-size-3xl);
    font-weight: 700;
    color: var(--primary-color);
    margin-bottom: var(--spacing-xs);
}

.stat-label {
    color: var(--text-secondary);
    font-size: var(--font-size-sm);
}

/* CTA Section */
.cta-section {
    padding: var(--spacing-2xl) 0;
    background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
    color: var(--white);
}

.cta-content h2 {
    font-size: var(--font-size-3xl);
    margin-bottom: var(--spacing-md);
}

.cta-content p {
    font-size: var(--font-size-lg);
    margin-bottom: var(--spacing-xl);
    opacity: 0.9;
}

.cta-buttons {
    display: flex;
    gap: var(--spacing-md);
    justify-content: center;
}

/* Media Section */
.media-section {
    padding: var(--spacing-2xl) 0;
}

.media-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
    gap: var(--spacing-xl);
}

.media-card {
    background: var(--white);
    padding: var(--spacing-lg);
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-sm);
    transition: all var(--transition-normal);
}

.media-card:hover {
    box-shadow: var(--shadow-lg);
    transform: translateY(-2px);
}

.media-card h3 {
    margin-bottom: var(--spacing-md);
    color: var(--text-primary);
}

.media-video,
.media-audio {
    width: 100%;
    margin-bottom: var(--spacing-md);
    border-radius: var(--radius-md);
}

.media-card p {
    color: var(--text-secondary);
    line-height: 1.6;
}

/* Responsive Design */
@media (max-width: 768px) {
    .hero-content {
        grid-template-columns: 1fr;
        gap: var(--spacing-lg);
    }
    
    .hero-title {
        font-size: var(--font-size-3xl);
    }
    
    .hero-buttons {
        flex-direction: column;
    }
    
    .hero-stats {
        justify-content: center;
    }
    
    .cta-buttons {
        flex-direction: column;
        align-items: center;
    }
    
    .media-grid {
        grid-template-columns: 1fr;
    }
    
    .map-stats {
        position: static;
        margin-top: var(--spacing-lg);
        justify-content: center;
    }
}

@media (max-width: 480px) {
    .hero-stats {
        flex-direction: column;
        gap: var(--spacing-md);
    }
    
    .stats-grid {
        grid-template-columns: 1fr;
    }
}
</style>

<script>
// Animate statistics on scroll
function animateStats() {
    const statNumbers = document.querySelectorAll('.stat-number[data-target]');
    
    statNumbers.forEach(stat => {
        const target = parseInt(stat.dataset.target);
        const duration = 2000;
        const increment = target / (duration / 16);
        let current = 0;
        
        const timer = setInterval(() => {
            current += increment;
            if (current >= target) {
                current = target;
                clearInterval(timer);
            }
            stat.textContent = Math.floor(current);
        }, 16);
    });
}

// Intersection Observer for animations
const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            if (entry.target.classList.contains('stats-section')) {
                animateStats();
            }
            entry.target.classList.add('animate-in');
        }
    });
}, observerOptions);

// Observe elements for animation
document.addEventListener('DOMContentLoaded', function() {
    const animateElements = document.querySelectorAll('.feature-card, .service-card, .testimonial-card, .stat-card');
    animateElements.forEach(el => observer.observe(el));
    
    // Observe stats section
    const statsSection = document.querySelector('.stats-section');
    if (statsSection) {
        observer.observe(statsSection);
    }
});

// Interactive map placeholder
document.addEventListener('DOMContentLoaded', function() {
    const map = document.getElementById('interactive-map');
    if (map) {
        map.innerHTML = `
            <div style="display: flex; align-items: center; justify-content: center; height: 100%;">
                <div style="text-align: center;">
                    <i class="fas fa-globe" style="font-size: 4rem; margin-bottom: 1rem;"></i>
                    <h3>Interactive World Map</h3>
                    <p>Click on countries to see our tutors and students</p>
                    <button class="btn btn-primary" onclick="showMapDemo()">
                        <i class="fas fa-map-marked-alt"></i> Explore Map
                    </button>
                </div>
            </div>
        `;
    }
});

function showMapDemo() {
    showNotification('Map demo: This would show an interactive world map with tutor locations and statistics.', 'info');
}
</script>

<?php
// Include footer
include_once(__DIR__ . '/../includes/footer.php');
?>