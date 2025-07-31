// SmartStudy Hub - Basic JavaScript functionality

// Mobile menu toggle
function toggleMobileMenu() {
    const navLinks = document.querySelector('.nav-links');
    navLinks.classList.toggle('active');
}

// Form validation
function validateForm(form) {
    const inputs = form.querySelectorAll('input[required]');
    let isValid = true;
    
    inputs.forEach(input => {
        if (!input.value.trim()) {
            input.classList.add('error');
            isValid = false;
        } else {
            input.classList.remove('error');
        }
    });
    
    return isValid;
}

// Simple notification system
function showNotification(message, type = 'info') {
    const notification = document.createElement('div');
    notification.className = `alert alert-${type}`;
    notification.textContent = message;
    
    document.body.appendChild(notification);
    
    setTimeout(() => {
        notification.remove();
    }, 3000);
}

// Theme switcher (simple)
function toggleTheme() {
    document.body.classList.toggle('dark-theme');
    localStorage.setItem('theme', document.body.classList.contains('dark-theme') ? 'dark' : 'light');
}

// Load saved theme
document.addEventListener('DOMContentLoaded', function() {
    const savedTheme = localStorage.getItem('theme');
    if (savedTheme === 'dark') {
        document.body.classList.add('dark-theme');
    }
    
    // Add mobile menu toggle button
    const nav = document.querySelector('nav .container');
    if (nav) {
        const mobileToggle = document.createElement('button');
        mobileToggle.className = 'mobile-toggle';
        mobileToggle.innerHTML = '☰';
        mobileToggle.onclick = toggleMobileMenu;
        nav.appendChild(mobileToggle);
    }
    
    // Add form validation
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            if (!validateForm(this)) {
                e.preventDefault();
                showNotification('Please fill in all required fields.', 'danger');
            }
        });
    });
});

// Simple search functionality
function performSearch(query) {
    const services = document.querySelectorAll('.service');
    services.forEach(service => {
        const text = service.textContent.toLowerCase();
        if (text.includes(query.toLowerCase())) {
            service.style.display = 'block';
        } else {
            service.style.display = 'none';
        }
    });
}

// Export functions for global use
window.SmartStudyHub = {
    toggleMobileMenu,
    validateForm,
    showNotification,
    toggleTheme,
    performSearch
};
