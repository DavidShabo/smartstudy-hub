/**
 * SmartStudy Hub - Main JavaScript File
 * Handles mobile menu, form validation, interactive features, and theme switching
 */

// Wait for DOM to be fully loaded
document.addEventListener('DOMContentLoaded', function() {
    
    // Initialize all components
    initMobileMenu();
    initThemeSwitcher();
    initFormValidation();
    initInteractiveFeatures();
    initSearchFunctionality();
    initModalHandlers();
    initSmoothScrolling();
    initLazyLoading();
    initTooltips();
    initNotifications();
    
    // Add seasonal decorations for seasonal theme
    if (document.body.classList.contains('theme-seasonal')) {
        addSeasonalDecorations();
    }
});

/**
 * Mobile Menu Functionality
 */
function initMobileMenu() {
    const mobileToggle = document.querySelector('.mobile-menu-toggle');
    const mainNav = document.querySelector('.main-nav');
    
    if (mobileToggle && mainNav) {
        mobileToggle.addEventListener('click', function() {
            mainNav.classList.toggle('active');
            mobileToggle.classList.toggle('active');
            
            // Animate hamburger menu
            const spans = mobileToggle.querySelectorAll('span');
            spans.forEach((span, index) => {
                if (mainNav.classList.contains('active')) {
                    if (index === 0) span.style.transform = 'rotate(45deg) translate(5px, 5px)';
                    if (index === 1) span.style.opacity = '0';
                    if (index === 2) span.style.transform = 'rotate(-45deg) translate(7px, -6px)';
                } else {
                    span.style.transform = '';
                    span.style.opacity = '';
                }
            });
        });
        
        // Close mobile menu when clicking outside
        document.addEventListener('click', function(e) {
            if (!mobileToggle.contains(e.target) && !mainNav.contains(e.target)) {
                mainNav.classList.remove('active');
                mobileToggle.classList.remove('active');
            }
        });
    }
}

/**
 * Theme Switcher Functionality
 */
function initThemeSwitcher() {
    const themeButtons = document.querySelectorAll('.theme-btn');
    
    themeButtons.forEach(button => {
        button.addEventListener('click', function() {
            const theme = this.dataset.theme;
            
            // Update body class
            document.body.className = 'theme-' + theme;
            
            // Save theme preference
            document.cookie = 'site_theme=' + theme + '; path=/; max-age=31536000';
            
            // Update active button
            themeButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
            
            // Show notification
            showNotification('Theme changed to ' + theme.charAt(0).toUpperCase() + theme.slice(1), 'success');
            
            // Add seasonal decorations if needed
            if (theme === 'seasonal') {
                addSeasonalDecorations();
            } else {
                removeSeasonalDecorations();
            }
        });
    });
    
    // Set active theme button on load
    const currentTheme = document.body.className.replace('theme-', '');
    const activeButton = document.querySelector(`[data-theme="${currentTheme}"]`);
    if (activeButton) {
        activeButton.classList.add('active');
    }
}

/**
 * Form Validation
 */
function initFormValidation() {
    const forms = document.querySelectorAll('form[data-validate]');
    
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            if (!validateForm(this)) {
                e.preventDefault();
            }
        });
        
        // Real-time validation
        const inputs = form.querySelectorAll('input, textarea, select');
        inputs.forEach(input => {
            input.addEventListener('blur', function() {
                validateField(this);
            });
            
            input.addEventListener('input', function() {
                clearFieldError(this);
            });
        });
    });
}

/**
 * Validate individual form field
 */
function validateField(field) {
    const value = field.value.trim();
    const type = field.type;
    const required = field.hasAttribute('required');
    const minLength = field.getAttribute('minlength');
    const maxLength = field.getAttribute('maxlength');
    const pattern = field.getAttribute('pattern');
    
    // Clear previous errors
    clearFieldError(field);
    
    // Required field validation
    if (required && !value) {
        showFieldError(field, 'This field is required');
        return false;
    }
    
    // Length validation
    if (minLength && value.length < parseInt(minLength)) {
        showFieldError(field, `Minimum ${minLength} characters required`);
        return false;
    }
    
    if (maxLength && value.length > parseInt(maxLength)) {
        showFieldError(field, `Maximum ${maxLength} characters allowed`);
        return false;
    }
    
    // Email validation
    if (type === 'email' && value) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(value)) {
            showFieldError(field, 'Please enter a valid email address');
            return false;
        }
    }
    
    // Pattern validation
    if (pattern && value) {
        const regex = new RegExp(pattern);
        if (!regex.test(value)) {
            showFieldError(field, field.getAttribute('data-error') || 'Invalid format');
            return false;
        }
    }
    
    return true;
}

/**
 * Validate entire form
 */
function validateForm(form) {
    const fields = form.querySelectorAll('input, textarea, select');
    let isValid = true;
    
    fields.forEach(field => {
        if (!validateField(field)) {
            isValid = false;
        }
    });
    
    return isValid;
}

/**
 * Show field error
 */
function showFieldError(field, message) {
    field.classList.add('error');
    
    // Remove existing error message
    const existingError = field.parentNode.querySelector('.form-error');
    if (existingError) {
        existingError.remove();
    }
    
    // Add new error message
    const errorElement = document.createElement('div');
    errorElement.className = 'form-error';
    errorElement.textContent = message;
    field.parentNode.appendChild(errorElement);
}

/**
 * Clear field error
 */
function clearFieldError(field) {
    field.classList.remove('error');
    const errorElement = field.parentNode.querySelector('.form-error');
    if (errorElement) {
        errorElement.remove();
    }
}

/**
 * Interactive Features
 */
function initInteractiveFeatures() {
    // Service card interactions
    const serviceCards = document.querySelectorAll('.service-card');
    serviceCards.forEach(card => {
        card.addEventListener('click', function() {
            const serviceId = this.dataset.serviceId;
            if (serviceId) {
                window.location.href = `/public/service.php?id=${serviceId}`;
            }
        });
    });
    
    // Rating system
    const ratingStars = document.querySelectorAll('.rating-star');
    ratingStars.forEach(star => {
        star.addEventListener('click', function() {
            const rating = this.dataset.rating;
            const container = this.closest('.rating-container');
            const stars = container.querySelectorAll('.rating-star');
            
            // Update visual state
            stars.forEach((s, index) => {
                if (index < rating) {
                    s.classList.add('active');
                } else {
                    s.classList.remove('active');
                }
            });
            
            // Update hidden input
            const input = container.querySelector('input[type="hidden"]');
            if (input) {
                input.value = rating;
            }
        });
    });
    
    // Progress bars animation
    const progressBars = document.querySelectorAll('.progress-bar');
    progressBars.forEach(bar => {
        const fill = bar.querySelector('.progress-fill');
        if (fill) {
            const percentage = fill.dataset.percentage || 0;
            setTimeout(() => {
                fill.style.width = percentage + '%';
            }, 500);
        }
    });
}

/**
 * Search Functionality
 */
function initSearchFunctionality() {
    const searchInput = document.querySelector('#search-input');
    const searchResults = document.querySelector('#search-results');
    
    if (searchInput && searchResults) {
        let searchTimeout;
        
        searchInput.addEventListener('input', function() {
            clearTimeout(searchTimeout);
            const query = this.value.trim();
            
            if (query.length < 2) {
                searchResults.style.display = 'none';
                return;
            }
            
            searchTimeout = setTimeout(() => {
                performSearch(query);
            }, 300);
        });
        
        // Close search results when clicking outside
        document.addEventListener('click', function(e) {
            if (!searchInput.contains(e.target) && !searchResults.contains(e.target)) {
                searchResults.style.display = 'none';
            }
        });
    }
}

/**
 * Perform search
 */
function performSearch(query) {
    const searchResults = document.querySelector('#search-results');
    
    // Show loading state
    searchResults.innerHTML = '<div class="spinner"></div>';
    searchResults.style.display = 'block';
    
    // Simulate search (replace with actual AJAX call)
    setTimeout(() => {
        const results = [
            { title: 'Mathematics Tutoring', url: '/public/service.php?id=1' },
            { title: 'Physics Tutoring', url: '/public/service.php?id=2' },
            { title: 'Chemistry Help', url: '/public/service.php?id=3' }
        ].filter(item => 
            item.title.toLowerCase().includes(query.toLowerCase())
        );
        
        displaySearchResults(results);
    }, 500);
}

/**
 * Display search results
 */
function displaySearchResults(results) {
    const searchResults = document.querySelector('#search-results');
    
    if (results.length === 0) {
        searchResults.innerHTML = '<div class="no-results">No results found</div>';
    } else {
        const html = results.map(result => 
            `<a href="${result.url}" class="search-result-item">${result.title}</a>`
        ).join('');
        searchResults.innerHTML = html;
    }
}

/**
 * Modal Handlers
 */
function initModalHandlers() {
    // Open modal
    const modalTriggers = document.querySelectorAll('[data-modal]');
    modalTriggers.forEach(trigger => {
        trigger.addEventListener('click', function(e) {
            e.preventDefault();
            const modalId = this.dataset.modal;
            openModal(modalId);
        });
    });
    
    // Close modal
    const modalCloses = document.querySelectorAll('.modal-close, .modal-overlay');
    modalCloses.forEach(close => {
        close.addEventListener('click', function() {
            closeModal(this.closest('.modal'));
        });
    });
    
    // Close modal with Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            const openModal = document.querySelector('.modal.active');
            if (openModal) {
                closeModal(openModal);
            }
        }
    });
}

/**
 * Open modal
 */
function openModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
        modal.classList.add('active');
        document.body.style.overflow = 'hidden';
    }
}

/**
 * Close modal
 */
function closeModal(modal) {
    if (modal) {
        modal.classList.remove('active');
        document.body.style.overflow = '';
    }
}

/**
 * Smooth Scrolling
 */
function initSmoothScrolling() {
    const smoothScrollLinks = document.querySelectorAll('a[href^="#"]');
    
    smoothScrollLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('href');
            const targetElement = document.querySelector(targetId);
            
            if (targetElement) {
                targetElement.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
}

/**
 * Lazy Loading
 */
function initLazyLoading() {
    const lazyImages = document.querySelectorAll('img[data-src]');
    
    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.dataset.src;
                    img.classList.remove('lazy');
                    imageObserver.unobserve(img);
                }
            });
        });
        
        lazyImages.forEach(img => imageObserver.observe(img));
    } else {
        // Fallback for older browsers
        lazyImages.forEach(img => {
            img.src = img.dataset.src;
            img.classList.remove('lazy');
        });
    }
}

/**
 * Tooltips
 */
function initTooltips() {
    const tooltipElements = document.querySelectorAll('[data-tooltip]');
    
    tooltipElements.forEach(element => {
        element.addEventListener('mouseenter', function() {
            const tooltip = document.createElement('div');
            tooltip.className = 'tooltip';
            tooltip.textContent = this.dataset.tooltip;
            document.body.appendChild(tooltip);
            
            const rect = this.getBoundingClientRect();
            tooltip.style.left = rect.left + (rect.width / 2) - (tooltip.offsetWidth / 2) + 'px';
            tooltip.style.top = rect.top - tooltip.offsetHeight - 5 + 'px';
            
            this._tooltip = tooltip;
        });
        
        element.addEventListener('mouseleave', function() {
            if (this._tooltip) {
                this._tooltip.remove();
                this._tooltip = null;
            }
        });
    });
}

/**
 * Notifications
 */
function initNotifications() {
    // Create notification container if it doesn't exist
    if (!document.querySelector('.notification-container')) {
        const container = document.createElement('div');
        container.className = 'notification-container';
        document.body.appendChild(container);
    }
}

/**
 * Show notification
 */
function showNotification(message, type = 'info', duration = 5000) {
    const container = document.querySelector('.notification-container');
    const notification = document.createElement('div');
    notification.className = `notification notification-${type}`;
    notification.innerHTML = `
        <div class="notification-content">
            <span class="notification-message">${message}</span>
            <button class="notification-close">&times;</button>
        </div>
    `;
    
    container.appendChild(notification);
    
    // Animate in
    setTimeout(() => {
        notification.classList.add('show');
    }, 100);
    
    // Auto remove
    setTimeout(() => {
        removeNotification(notification);
    }, duration);
    
    // Manual close
    notification.querySelector('.notification-close').addEventListener('click', () => {
        removeNotification(notification);
    });
}

/**
 * Remove notification
 */
function removeNotification(notification) {
    notification.classList.remove('show');
    setTimeout(() => {
        if (notification.parentNode) {
            notification.remove();
        }
    }, 300);
}

/**
 * Add seasonal decorations
 */
function addSeasonalDecorations() {
    if (document.querySelector('.seasonal-decoration')) return;
    
    const decorations = ['🍂', '🍁', '🌰', '🍃'];
    const container = document.createElement('div');
    container.className = 'seasonal-decorations';
    
    decorations.forEach((emoji, index) => {
        const decoration = document.createElement('div');
        decoration.className = 'seasonal-decoration';
        decoration.textContent = emoji;
        decoration.style.left = (20 + index * 40) + 'px';
        decoration.style.top = (20 + index * 20) + 'px';
        decoration.style.animationDelay = (index * 0.5) + 's';
        container.appendChild(decoration);
    });
    
    document.body.appendChild(container);
}

/**
 * Remove seasonal decorations
 */
function removeSeasonalDecorations() {
    const decorations = document.querySelector('.seasonal-decorations');
    if (decorations) {
        decorations.remove();
    }
}

/**
 * Utility Functions
 */
function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

function throttle(func, limit) {
    let inThrottle;
    return function() {
        const args = arguments;
        const context = this;
        if (!inThrottle) {
            func.apply(context, args);
            inThrottle = true;
            setTimeout(() => inThrottle = false, limit);
        }
    };
}

// Export functions for global access
window.SmartStudyHub = {
    showNotification,
    openModal,
    closeModal,
    validateForm,
    validateField
};
