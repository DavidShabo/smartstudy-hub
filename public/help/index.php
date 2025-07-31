<?php
// SmartStudy Hub - Help Documentation Index
// Main help page with navigation to all documentation sections

session_start();
include_once(__DIR__ . '/../config/config.php');

// Include header
include_once(__DIR__ . '/../../includes/header.php');
?>

<div class="container">
    <!-- Help Header -->
    <div class="help-header">
        <h1><i class="fas fa-question-circle"></i> Help & Documentation</h1>
        <p>Find answers to common questions and learn how to use SmartStudy Hub effectively</p>
    </div>

    <!-- Help Navigation -->
    <div class="help-navigation">
        <div class="help-search">
            <input type="text" id="help-search" class="form-control" placeholder="Search help articles...">
            <i class="fas fa-search"></i>
        </div>
        
        <div class="help-categories">
            <h3>Quick Navigation</h3>
            <div class="category-grid">
                <a href="getting-started.php" class="help-category">
                    <div class="category-icon">
                        <i class="fas fa-rocket"></i>
                    </div>
                    <div class="category-content">
                        <h4>Getting Started</h4>
                        <p>Learn the basics of SmartStudy Hub</p>
                    </div>
                </a>
                
                <a href="account.php" class="help-category">
                    <div class="category-icon">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="category-content">
                        <h4>Account Management</h4>
                        <p>Manage your profile and settings</p>
                    </div>
                </a>
                
                <a href="booking.php" class="help-category">
                    <div class="category-icon">
                        <i class="fas fa-calendar"></i>
                    </div>
                    <div class="category-content">
                        <h4>Booking Sessions</h4>
                        <p>How to book and manage tutoring sessions</p>
                    </div>
                </a>
                
                <a href="admin.php" class="help-category">
                    <div class="category-icon">
                        <i class="fas fa-tools"></i>
                    </div>
                    <div class="category-content">
                        <h4>Admin Guide</h4>
                        <p>Administrative functions and management</p>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <!-- FAQ Section -->
    <div class="faq-section">
        <h2>Frequently Asked Questions</h2>
        
        <div class="faq-list">
            <div class="faq-item">
                <div class="faq-question" onclick="toggleFAQ(this)">
                    <h4>How do I create an account?</h4>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>To create an account, click the "Register" button in the top navigation. Fill in your details including name, email, and password. You'll receive a confirmation email to verify your account.</p>
                </div>
            </div>
            
            <div class="faq-item">
                <div class="faq-question" onclick="toggleFAQ(this)">
                    <h4>How do I book a tutoring session?</h4>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>Browse our services page to find the subject you need help with. Click on a service to view details, then click "Book Now" to schedule a session. You can choose your preferred date and time.</p>
                </div>
            </div>
            
            <div class="faq-item">
                <div class="faq-question" onclick="toggleFAQ(this)">
                    <h4>What payment methods do you accept?</h4>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>We accept all major credit cards (Visa, MasterCard, American Express), PayPal, and bank transfers. All payments are processed securely through our payment partners.</p>
                </div>
            </div>
            
            <div class="faq-item">
                <div class="faq-question" onclick="toggleFAQ(this)">
                    <h4>Can I cancel or reschedule a session?</h4>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>Yes, you can cancel or reschedule sessions up to 24 hours before the scheduled time. Go to your "My Orders" page to manage your bookings. Late cancellations may incur a fee.</p>
                </div>
            </div>
            
            <div class="faq-item">
                <div class="faq-question" onclick="toggleFAQ(this)">
                    <h4>How do I contact support?</h4>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>You can contact our support team through the contact form, email us at support@smartstudy.com, or call us at +1-555-0123. We're available 24/7 to help you.</p>
                </div>
            </div>
            
            <div class="faq-item">
                <div class="faq-question" onclick="toggleFAQ(this)">
                    <h4>What subjects do you offer tutoring for?</h4>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>We offer tutoring in 20+ subjects including Mathematics, Physics, Chemistry, Biology, English, History, Computer Science, Economics, Psychology, and various languages. Check our services page for the complete list.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Support -->
    <div class="support-section">
        <div class="support-card">
            <h3>Still Need Help?</h3>
            <p>Can't find what you're looking for? Our support team is here to help!</p>
            <div class="support-actions">
                <a href="/public/contact.php" class="btn btn-primary">
                    <i class="fas fa-envelope"></i> Contact Support
                </a>
                <a href="mailto:support@smartstudy.com" class="btn btn-outline">
                    <i class="fas fa-at"></i> Email Us
                </a>
            </div>
        </div>
    </div>
</div>

<style>
/* Help Header */
.help-header {
    text-align: center;
    margin-bottom: var(--spacing-2xl);
    padding: var(--spacing-xl) 0;
}

.help-header h1 {
    font-size: var(--font-size-4xl);
    margin-bottom: var(--spacing-md);
    color: var(--text-primary);
}

.help-header p {
    font-size: var(--font-size-lg);
    color: var(--text-secondary);
    max-width: 600px;
    margin: 0 auto;
}

/* Help Navigation */
.help-navigation {
    margin-bottom: var(--spacing-2xl);
}

.help-search {
    position: relative;
    max-width: 500px;
    margin: 0 auto var(--spacing-xl);
}

.help-search input {
    padding-right: 3rem;
}

.help-search i {
    position: absolute;
    right: var(--spacing-md);
    top: 50%;
    transform: translateY(-50%);
    color: var(--gray-500);
}

.help-categories h3 {
    margin-bottom: var(--spacing-lg);
    text-align: center;
    color: var(--text-primary);
}

.category-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: var(--spacing-lg);
}

.help-category {
    display: flex;
    align-items: center;
    gap: var(--spacing-lg);
    padding: var(--spacing-lg);
    background: var(--white);
    border: 1px solid var(--border-primary);
    border-radius: var(--radius-lg);
    text-decoration: none;
    color: var(--text-primary);
    transition: all var(--transition-normal);
}

.help-category:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-lg);
    border-color: var(--primary-color);
    color: var(--text-primary);
}

.category-icon {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: var(--font-size-xl);
    color: var(--white);
    flex-shrink: 0;
}

.category-content h4 {
    margin-bottom: var(--spacing-xs);
    color: var(--text-primary);
}

.category-content p {
    color: var(--text-secondary);
    font-size: var(--font-size-sm);
    margin: 0;
}

/* FAQ Section */
.faq-section {
    margin-bottom: var(--spacing-2xl);
}

.faq-section h2 {
    text-align: center;
    margin-bottom: var(--spacing-xl);
    color: var(--text-primary);
}

.faq-list {
    max-width: 800px;
    margin: 0 auto;
}

.faq-item {
    background: var(--white);
    border: 1px solid var(--border-primary);
    border-radius: var(--radius-md);
    margin-bottom: var(--spacing-md);
    overflow: hidden;
}

.faq-question {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: var(--spacing-lg);
    cursor: pointer;
    transition: background-color var(--transition-fast);
}

.faq-question:hover {
    background-color: var(--bg-secondary);
}

.faq-question h4 {
    margin: 0;
    color: var(--text-primary);
}

.faq-question i {
    color: var(--gray-500);
    transition: transform var(--transition-fast);
}

.faq-item.active .faq-question i {
    transform: rotate(180deg);
}

.faq-answer {
    padding: 0 var(--spacing-lg);
    max-height: 0;
    overflow: hidden;
    transition: all var(--transition-normal);
}

.faq-item.active .faq-answer {
    padding: 0 var(--spacing-lg) var(--spacing-lg);
    max-height: 200px;
}

.faq-answer p {
    color: var(--text-secondary);
    line-height: 1.6;
    margin: 0;
}

/* Support Section */
.support-section {
    margin-bottom: var(--spacing-2xl);
}

.support-card {
    background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
    color: var(--white);
    padding: var(--spacing-2xl);
    border-radius: var(--radius-lg);
    text-align: center;
}

.support-card h3 {
    margin-bottom: var(--spacing-md);
    color: var(--white);
}

.support-card p {
    margin-bottom: var(--spacing-xl);
    opacity: 0.9;
}

.support-actions {
    display: flex;
    gap: var(--spacing-md);
    justify-content: center;
}

/* Responsive Design */
@media (max-width: 768px) {
    .category-grid {
        grid-template-columns: 1fr;
    }
    
    .help-category {
        flex-direction: column;
        text-align: center;
        gap: var(--spacing-md);
    }
    
    .support-actions {
        flex-direction: column;
        align-items: center;
    }
}
</style>

<script>
// Toggle FAQ items
function toggleFAQ(element) {
    const faqItem = element.parentElement;
    const isActive = faqItem.classList.contains('active');
    
    // Close all FAQ items
    document.querySelectorAll('.faq-item').forEach(item => {
        item.classList.remove('active');
    });
    
    // Open clicked item if it wasn't active
    if (!isActive) {
        faqItem.classList.add('active');
    }
}

// Search functionality
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('help-search');
    const faqItems = document.querySelectorAll('.faq-item');
    
    searchInput.addEventListener('input', function() {
        const query = this.value.toLowerCase();
        
        faqItems.forEach(item => {
            const question = item.querySelector('h4').textContent.toLowerCase();
            const answer = item.querySelector('p').textContent.toLowerCase();
            
            if (question.includes(query) || answer.includes(query)) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    });
});

// Auto-expand FAQ on page load if URL has hash
document.addEventListener('DOMContentLoaded', function() {
    if (window.location.hash) {
        const targetElement = document.querySelector(window.location.hash);
        if (targetElement && targetElement.classList.contains('faq-item')) {
            targetElement.classList.add('active');
        }
    }
});
</script>

<?php
// Include footer
include_once(__DIR__ . '/../../includes/footer.php');
?>
