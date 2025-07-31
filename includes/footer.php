    </main>
    
    <!-- Footer -->
    <footer class="site-footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>SmartStudy Hub</h3>
                    <p>Connecting students with expert tutors for personalized learning experiences.</p>
                    <div class="social-links">
                        <a href="#" aria-label="Facebook"><i class="fab fa-facebook"></i></a>
                        <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                        <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                        <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
                
                <div class="footer-section">
                    <h4>Quick Links</h4>
                    <ul class="footer-links">
                        <li><a href="/public/services.php">Tutoring Services</a></li>
                        <li><a href="/public/questions.php">Ask Questions</a></li>
                        <li><a href="/public/about.php">About Us</a></li>
                        <li><a href="/public/contact.php">Contact</a></li>
                    </ul>
                </div>
                
                <div class="footer-section">
                    <h4>Help & Support</h4>
                    <ul class="footer-links">
                        <li><a href="/public/help/">Getting Started</a></li>
                        <li><a href="/public/help/booking.php">Booking Guide</a></li>
                        <li><a href="/public/help/account.php">Account Help</a></li>
                        <li><a href="/public/help/admin.php">Admin Guide</a></li>
                    </ul>
                </div>
                
                <div class="footer-section">
                    <h4>Contact Info</h4>
                    <div class="contact-info">
                        <p><i class="fas fa-envelope"></i> contact@smartstudy.com</p>
                        <p><i class="fas fa-phone"></i> +1-555-0123</p>
                        <p><i class="fas fa-map-marker-alt"></i> Windsor, ON, Canada</p>
                    </div>
                </div>
            </div>
            
            <div class="footer-bottom">
                <div class="footer-bottom-content">
                    <p>&copy; <?php echo date('Y'); ?> SmartStudy Hub. All rights reserved.</p>
                    <div class="footer-bottom-links">
                        <a href="/public/privacy.php">Privacy Policy</a>
                        <a href="/public/terms.php">Terms of Service</a>
                        <a href="/public/sitemap.xml.php">Sitemap</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    
    <!-- JavaScript Files -->
    <script src="/assets/js/app.js"></script>
    
    <!-- Theme Switcher Script -->
    <script>
        // Theme switching functionality
        document.addEventListener('DOMContentLoaded', function() {
            const themeButtons = document.querySelectorAll('.theme-btn');
            
            themeButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const theme = this.dataset.theme;
                    document.body.className = 'theme-' + theme;
                    document.cookie = 'site_theme=' + theme + '; path=/; max-age=31536000';
                    
                    // Update active button
                    themeButtons.forEach(btn => btn.classList.remove('active'));
                    this.classList.add('active');
                });
            });
            
            // Set active theme button
            const currentTheme = document.body.className.replace('theme-', '');
            const activeButton = document.querySelector(`[data-theme="${currentTheme}"]`);
            if (activeButton) {
                activeButton.classList.add('active');
            }
        });
    </script>
</body>
</html>
