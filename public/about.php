<?php
// SmartStudy Hub - About Page
// Comprehensive business case and platform description

session_start();
include_once(__DIR__ . '/../config/config.php');

// Include header
include_once(__DIR__ . '/../includes/header.php');
?>

<div class="container">
    <!-- About Header -->
    <div class="about-header">
        <h1><i class="fas fa-info-circle"></i> About SmartStudy Hub</h1>
        <p>Empowering students worldwide with personalized online tutoring experiences</p>
    </div>

    <!-- Mission Section -->
    <section class="mission-section">
        <div class="mission-content">
            <div class="mission-text">
                <h2>Our Mission</h2>
                <p>At SmartStudy Hub, we believe that every student deserves access to quality education regardless of their location or circumstances. Our mission is to connect students with expert tutors through an innovative online platform that makes learning accessible, engaging, and effective.</p>
                
                <div class="mission-stats">
                    <div class="stat-item">
                        <span class="stat-number">500+</span>
                        <span class="stat-label">Students Helped</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">50+</span>
                        <span class="stat-label">Expert Tutors</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">20+</span>
                        <span class="stat-label">Subjects</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">98%</span>
                        <span class="stat-label">Satisfaction Rate</span>
                    </div>
                </div>
            </div>
            <div class="mission-image">
                <img src="/assets/images/about-mission.jpg" alt="Students learning online" class="mission-img">
            </div>
        </div>
    </section>

    <!-- Business Case Section -->
    <section class="business-case-section">
        <div class="section-header text-center">
            <h2>Why SmartStudy Hub?</h2>
            <p>Addressing the growing demand for quality online education</p>
        </div>
        
        <div class="business-case-grid">
            <div class="case-card">
                <div class="case-icon">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <h3>Personalized Learning</h3>
                <p>Every student has unique learning needs. Our platform connects students with tutors who can provide personalized attention and customized learning plans tailored to individual strengths and weaknesses.</p>
            </div>
            
            <div class="case-card">
                <div class="case-icon">
                    <i class="fas fa-clock"></i>
                </div>
                <h3>Flexible Scheduling</h3>
                <p>Traditional tutoring often requires rigid schedules. SmartStudy Hub offers 24/7 availability, allowing students to learn at their own pace and schedule sessions that fit their busy lives.</p>
            </div>
            
            <div class="case-card">
                <div class="case-icon">
                    <i class="fas fa-globe"></i>
                </div>
                <h3>Global Access</h3>
                <p>Geographic limitations shouldn't restrict access to quality education. Our platform connects students with expert tutors from around the world, breaking down geographical barriers.</p>
            </div>
            
            <div class="case-card">
                <div class="case-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <h3>Progress Tracking</h3>
                <p>Students and parents can track learning progress with detailed analytics and reports. Our system provides insights into strengths, areas for improvement, and overall academic growth.</p>
            </div>
            
            <div class="case-card">
                <div class="case-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3>Safe Environment</h3>
                <p>All tutors undergo thorough background checks and verification. Our platform provides a secure, monitored environment where students can learn safely and confidently.</p>
            </div>
            
            <div class="case-card">
                <div class="case-icon">
                    <i class="fas fa-dollar-sign"></i>
                </div>
                <h3>Cost Effective</h3>
                <p>Online tutoring eliminates travel costs and reduces overhead, making quality education more affordable. Our transparent pricing ensures you know exactly what you're paying for.</p>
            </div>
        </div>
    </section>

    <!-- Services Overview -->
    <section class="services-overview-section">
        <div class="section-header text-center">
            <h2>Comprehensive Subject Coverage</h2>
            <p>20+ subjects designed to meet diverse academic needs</p>
        </div>
        
        <div class="subjects-grid">
            <div class="subject-category">
                <h3><i class="fas fa-calculator"></i> Mathematics</h3>
                <ul>
                    <li>Algebra & Geometry</li>
                    <li>Calculus & Statistics</li>
                    <li>Linear Algebra</li>
                    <li>Advanced Mathematics</li>
                </ul>
            </div>
            
            <div class="subject-category">
                <h3><i class="fas fa-atom"></i> Sciences</h3>
                <ul>
                    <li>Physics & Chemistry</li>
                    <li>Biology & Biochemistry</li>
                    <li>Organic Chemistry</li>
                    <li>Laboratory Techniques</li>
                </ul>
            </div>
            
            <div class="subject-category">
                <h3><i class="fas fa-language"></i> Languages</h3>
                <ul>
                    <li>English Literature</li>
                    <li>Spanish & French</li>
                    <li>German & Other Languages</li>
                    <li>Creative Writing</li>
                </ul>
            </div>
            
            <div class="subject-category">
                <h3><i class="fas fa-laptop-code"></i> Technology</h3>
                <ul>
                    <li>Computer Science</li>
                    <li>Programming & Algorithms</li>
                    <li>Software Development</li>
                    <li>Web Technologies</li>
                </ul>
            </div>
            
            <div class="subject-category">
                <h3><i class="fas fa-landmark"></i> Social Studies</h3>
                <ul>
                    <li>History & Geography</li>
                    <li>Economics & Psychology</li>
                    <li>Political Science</li>
                    <li>Research Methods</li>
                </ul>
            </div>
            
            <div class="subject-category">
                <h3><i class="fas fa-microphone"></i> Communication</h3>
                <ul>
                    <li>Public Speaking</li>
                    <li>Presentation Skills</li>
                    <li>Academic Writing</li>
                    <li>Communication Skills</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- How It Works -->
    <section class="how-it-works-section">
        <div class="section-header text-center">
            <h2>How SmartStudy Hub Works</h2>
            <p>Simple steps to start your learning journey</p>
        </div>
        
        <div class="steps-grid">
            <div class="step-card">
                <div class="step-number">1</div>
                <div class="step-icon">
                    <i class="fas fa-user-plus"></i>
                </div>
                <h3>Create Account</h3>
                <p>Sign up for free and create your student profile. Choose your subjects of interest and learning goals.</p>
            </div>
            
            <div class="step-card">
                <div class="step-number">2</div>
                <div class="step-icon">
                    <i class="fas fa-search"></i>
                </div>
                <h3>Find Your Tutor</h3>
                <p>Browse our extensive list of qualified tutors. Read reviews, check credentials, and find the perfect match.</p>
            </div>
            
            <div class="step-card">
                <div class="step-number">3</div>
                <div class="step-icon">
                    <i class="fas fa-calendar-check"></i>
                </div>
                <h3>Book Session</h3>
                <p>Schedule a session at your convenience. Choose from multiple time slots and session durations.</p>
            </div>
            
            <div class="step-card">
                <div class="step-number">4</div>
                <div class="step-icon">
                    <i class="fas fa-video"></i>
                </div>
                <h3>Start Learning</h3>
                <p>Join your session via our interactive platform. Use screen sharing, whiteboards, and file sharing.</p>
            </div>
            
            <div class="step-card">
                <div class="step-number">5</div>
                <div class="step-icon">
                    <i class="fas fa-star"></i>
                </div>
                <h3>Track Progress</h3>
                <p>Monitor your learning progress with detailed reports and analytics. Celebrate your achievements!</p>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="team-section">
        <div class="section-header text-center">
            <h2>Our Team</h2>
            <p>Meet the dedicated professionals behind SmartStudy Hub</p>
        </div>
        
        <div class="team-grid">
            <div class="team-member">
                <div class="member-avatar">
                    <img src="/assets/images/team/ceo.jpg" alt="CEO" onerror="this.src='/assets/images/avatars/default.jpg'">
                </div>
                <h3>Dr. Sarah Johnson</h3>
                <span class="member-role">CEO & Founder</span>
                <p>Former university professor with 15+ years in education technology. Passionate about making quality education accessible to all.</p>
            </div>
            
            <div class="team-member">
                <div class="member-avatar">
                    <img src="/assets/images/team/cto.jpg" alt="CTO" onerror="this.src='/assets/images/avatars/default.jpg'">
                </div>
                <h3>Michael Chen</h3>
                <span class="member-role">Chief Technology Officer</span>
                <p>Experienced software engineer specializing in educational platforms. Led development of multiple successful ed-tech solutions.</p>
            </div>
            
            <div class="team-member">
                <div class="member-avatar">
                    <img src="/assets/images/team/head-tutor.jpg" alt="Head Tutor" onerror="this.src='/assets/images/avatars/default.jpg'">
                </div>
                <h3>Dr. Emily Rodriguez</h3>
                <span class="member-role">Head of Academic Affairs</span>
                <p>PhD in Education with expertise in curriculum development. Ensures quality standards across all tutoring programs.</p>
            </div>
        </div>
    </section>

    <!-- Values Section -->
    <section class="values-section">
        <div class="section-header text-center">
            <h2>Our Core Values</h2>
            <p>The principles that guide everything we do</p>
        </div>
        
        <div class="values-grid">
            <div class="value-card">
                <div class="value-icon">
                    <i class="fas fa-heart"></i>
                </div>
                <h3>Student Success</h3>
                <p>Every decision we make is focused on student success and academic achievement.</p>
            </div>
            
            <div class="value-card">
                <div class="value-icon">
                    <i class="fas fa-award"></i>
                </div>
                <h3>Quality Excellence</h3>
                <p>We maintain the highest standards in education and platform quality.</p>
            </div>
            
            <div class="value-card">
                <div class="value-icon">
                    <i class="fas fa-handshake"></i>
                </div>
                <h3>Trust & Integrity</h3>
                <p>Building lasting relationships through transparency and honest communication.</p>
            </div>
            
            <div class="value-card">
                <div class="value-icon">
                    <i class="fas fa-lightbulb"></i>
                </div>
                <h3>Innovation</h3>
                <p>Continuously improving our platform with cutting-edge technology and methods.</p>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="about-cta-section">
        <div class="cta-content text-center">
            <h2>Ready to Start Your Learning Journey?</h2>
            <p>Join thousands of students who are already achieving their academic goals with SmartStudy Hub</p>
            <div class="cta-buttons">
                <a href="/public/register.php" class="btn btn-primary btn-lg">
                    <i class="fas fa-rocket"></i> Get Started Today
                </a>
                <a href="/public/services.php" class="btn btn-outline btn-lg">
                    <i class="fas fa-graduation-cap"></i> Browse Services
                </a>
            </div>
        </div>
    </section>
</div>

<style>
/* About Header */
.about-header {
    text-align: center;
    margin-bottom: var(--spacing-2xl);
    padding: var(--spacing-xl) 0;
}

.about-header h1 {
    font-size: var(--font-size-4xl);
    margin-bottom: var(--spacing-md);
    color: var(--text-primary);
}

.about-header p {
    font-size: var(--font-size-lg);
    color: var(--text-secondary);
    max-width: 600px;
    margin: 0 auto;
}

/* Mission Section */
.mission-section {
    padding: var(--spacing-2xl) 0;
    background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
    color: var(--white);
    margin-bottom: var(--spacing-2xl);
}

.mission-content {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: var(--spacing-2xl);
    align-items: center;
}

.mission-text h2 {
    font-size: var(--font-size-3xl);
    margin-bottom: var(--spacing-lg);
    color: var(--white);
}

.mission-text p {
    font-size: var(--font-size-lg);
    line-height: 1.6;
    margin-bottom: var(--spacing-xl);
    opacity: 0.9;
}

.mission-stats {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: var(--spacing-lg);
}

.stat-item {
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

.mission-image {
    border-radius: var(--radius-lg);
    overflow: hidden;
    box-shadow: var(--shadow-xl);
}

.mission-img {
    width: 100%;
    height: auto;
}

/* Business Case Section */
.business-case-section {
    padding: var(--spacing-2xl) 0;
}

.business-case-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: var(--spacing-lg);
}

.case-card {
    background: var(--white);
    padding: var(--spacing-xl);
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-sm);
    transition: all var(--transition-normal);
    border: 1px solid var(--border-primary);
}

.case-card:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-lg);
    border-color: var(--primary-color);
}

.case-icon {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: var(--font-size-xl);
    color: var(--white);
    margin-bottom: var(--spacing-lg);
}

.case-card h3 {
    margin-bottom: var(--spacing-md);
    color: var(--text-primary);
}

.case-card p {
    color: var(--text-secondary);
    line-height: 1.6;
}

/* Services Overview */
.services-overview-section {
    padding: var(--spacing-2xl) 0;
    background-color: var(--bg-secondary);
}

.subjects-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: var(--spacing-lg);
}

.subject-category {
    background: var(--white);
    padding: var(--spacing-lg);
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-sm);
    transition: all var(--transition-normal);
}

.subject-category:hover {
    transform: translateY(-3px);
    box-shadow: var(--shadow-lg);
}

.subject-category h3 {
    display: flex;
    align-items: center;
    gap: var(--spacing-sm);
    margin-bottom: var(--spacing-md);
    color: var(--text-primary);
}

.subject-category ul {
    list-style: none;
    padding: 0;
}

.subject-category li {
    padding: var(--spacing-xs) 0;
    color: var(--text-secondary);
    border-bottom: 1px solid var(--border-primary);
}

.subject-category li:last-child {
    border-bottom: none;
}

/* How It Works */
.how-it-works-section {
    padding: var(--spacing-2xl) 0;
}

.steps-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: var(--spacing-lg);
}

.step-card {
    text-align: center;
    padding: var(--spacing-xl);
    background: var(--white);
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-sm);
    transition: all var(--transition-normal);
    position: relative;
}

.step-card:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-lg);
}

.step-number {
    position: absolute;
    top: -15px;
    left: 50%;
    transform: translateX(-50%);
    width: 30px;
    height: 30px;
    background: var(--primary-color);
    color: var(--white);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    font-size: var(--font-size-sm);
}

.step-icon {
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

.step-card h3 {
    margin-bottom: var(--spacing-md);
    color: var(--text-primary);
}

.step-card p {
    color: var(--text-secondary);
    line-height: 1.6;
}

/* Team Section */
.team-section {
    padding: var(--spacing-2xl) 0;
    background-color: var(--bg-secondary);
}

.team-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: var(--spacing-xl);
}

.team-member {
    background: var(--white);
    padding: var(--spacing-xl);
    border-radius: var(--radius-lg);
    text-align: center;
    box-shadow: var(--shadow-sm);
    transition: all var(--transition-normal);
}

.team-member:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-lg);
}

.member-avatar {
    width: 120px;
    height: 120px;
    margin: 0 auto var(--spacing-lg);
    border-radius: 50%;
    overflow: hidden;
    border: 4px solid var(--primary-color);
}

.member-avatar img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.team-member h3 {
    margin-bottom: var(--spacing-xs);
    color: var(--text-primary);
}

.member-role {
    color: var(--primary-color);
    font-weight: 600;
    margin-bottom: var(--spacing-md);
    display: block;
}

.team-member p {
    color: var(--text-secondary);
    line-height: 1.6;
}

/* Values Section */
.values-section {
    padding: var(--spacing-2xl) 0;
}

.values-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: var(--spacing-lg);
}

.value-card {
    text-align: center;
    padding: var(--spacing-xl);
    background: var(--white);
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-sm);
    transition: all var(--transition-normal);
}

.value-card:hover {
    transform: translateY(-3px);
    box-shadow: var(--shadow-lg);
}

.value-icon {
    width: 80px;
    height: 80px;
    margin: 0 auto var(--spacing-lg);
    background: linear-gradient(135deg, var(--accent-color) 0%, var(--accent-dark) 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: var(--font-size-2xl);
    color: var(--white);
}

.value-card h3 {
    margin-bottom: var(--spacing-md);
    color: var(--text-primary);
}

.value-card p {
    color: var(--text-secondary);
    line-height: 1.6;
}

/* CTA Section */
.about-cta-section {
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

/* Responsive Design */
@media (max-width: 768px) {
    .mission-content {
        grid-template-columns: 1fr;
        gap: var(--spacing-lg);
    }
    
    .mission-stats {
        grid-template-columns: 1fr;
    }
    
    .business-case-grid {
        grid-template-columns: 1fr;
    }
    
    .subjects-grid {
        grid-template-columns: 1fr;
    }
    
    .steps-grid {
        grid-template-columns: 1fr;
    }
    
    .team-grid {
        grid-template-columns: 1fr;
    }
    
    .values-grid {
        grid-template-columns: 1fr;
    }
    
    .cta-buttons {
        flex-direction: column;
        align-items: center;
    }
}

@media (max-width: 480px) {
    .about-header h1 {
        font-size: var(--font-size-3xl);
    }
    
    .mission-text h2 {
        font-size: var(--font-size-2xl);
    }
}
</style>

<?php
// Include footer
include_once(__DIR__ . '/../includes/footer.php');
?>