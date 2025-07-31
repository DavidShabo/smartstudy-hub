# SmartStudy Hub - Online Tutoring Platform

## Project Overview

SmartStudy Hub is a comprehensive online tutoring platform that connects students with expert tutors for personalized learning experiences. The platform offers 20+ subjects, flexible scheduling, interactive sessions, and a complete admin management system.

### Business Case

SmartStudy Hub addresses the growing demand for online education by providing:
- **Personalized Learning**: One-on-one tutoring sessions tailored to individual needs
- **Expert Tutors**: Qualified professionals with years of teaching experience
- **Flexible Scheduling**: 24/7 availability with multiple time slots
- **Comprehensive Subjects**: 20+ subjects from mathematics to languages
- **Interactive Platform**: Real-time video sessions with screen sharing and digital whiteboards
- **Progress Tracking**: Detailed reports and performance analytics

## Features

### Frontend Features
- ✅ **Responsive Design**: Works perfectly on desktop, tablet, and mobile devices
- ✅ **3 Theme System**: Default, Dark, and Seasonal themes with smooth transitions
- ✅ **Interactive Elements**: Dynamic forms, search functionality, and real-time validation
- ✅ **Multimedia Support**: Videos, audio files, and interactive maps
- ✅ **SEO Optimized**: Meta tags, structured data, and search engine friendly URLs
- ✅ **Accessibility**: ARIA labels, keyboard navigation, and screen reader support

### Backend Features
- ✅ **User Management**: Registration, authentication, and profile management
- ✅ **Service Management**: 20+ tutoring services with detailed information
- ✅ **Booking System**: Session scheduling with payment integration
- ✅ **Q&A Platform**: Question and answer system with file attachments
- ✅ **Rating System**: Service reviews and tutor ratings
- ✅ **Admin Panel**: Complete administrative interface with monitoring

### Database Features
- ✅ **20+ Services**: Comprehensive subject coverage with pricing options
- ✅ **User Roles**: Student, Tutor, and Admin roles with permissions
- ✅ **Order Management**: Complete booking and payment tracking
- ✅ **Content Management**: Dynamic content updates and management

## Technology Stack

- **Frontend**: HTML5, CSS3, JavaScript (ES6+)
- **Backend**: PHP 7.4+, MySQL 8.0+
- **Styling**: Custom CSS with CSS Grid and Flexbox
- **Icons**: Font Awesome 6.0
- **Fonts**: Google Fonts (Inter)
- **Responsive**: Mobile-first design approach

## Installation Instructions

### Prerequisites
- PHP 7.4 or higher
- MySQL 8.0 or higher
- Apache/Nginx web server
- Composer (for dependency management)

### Step 1: Clone the Repository
```bash
git clone https://github.com/yourusername/smartstudy-hub.git
cd smartstudy-hub
```

### Step 2: Database Setup
1. Create a new MySQL database:
```sql
CREATE DATABASE smartstudy;
```

2. Import the database schema:
```bash
mysql -u your_username -p smartstudy < sql/schema.sql
```

### Step 3: Configuration
1. Copy the configuration file:
```bash
cp config/config.example.php config/config.php
```

2. Edit `config/config.php` with your database credentials:
```php
<?php
$host = 'localhost';
$user = 'your_db_username';
$pass = 'your_db_password';
$db   = 'smartstudy';
?>
```

### Step 4: Web Server Configuration
1. Point your web server document root to the project directory
2. Ensure PHP has write permissions for the `storage/` directory
3. Configure URL rewriting (optional but recommended)

### Step 5: Install Dependencies
```bash
composer install
```

### Step 6: Set Permissions
```bash
chmod 755 storage/logs/
chmod 755 assets/images/
```

### Step 7: Access the Application
- Frontend: `http://your-domain.com/public/`
- Admin Panel: `http://your-domain.com/admin/`
- Default Admin: `admin@smartstudy.com` / `admin123`

## File Structure

```
smartstudy-hub/
├── admin/                 # Admin panel files
│   ├── dashboard.php     # Admin dashboard
│   ├── users.php         # User management
│   ├── services.php      # Service management
│   └── ...
├── assets/               # Static assets
│   ├── css/             # Stylesheets
│   ├── js/              # JavaScript files
│   ├── images/          # Images and media
│   └── media/           # Video and audio files
├── config/              # Configuration files
│   ├── config.php       # Database configuration
│   └── database.php     # Database connection
├── includes/            # Shared components
│   ├── header.php       # Site header
│   ├── footer.php       # Site footer
│   └── ...
├── lib/                 # Library files
│   ├── helpers.php      # Helper functions
│   ├── validation.php   # Form validation
│   └── ...
├── public/              # Public pages
│   ├── index.php        # Homepage
│   ├── services.php     # Services listing
│   ├── login.php        # User login
│   └── ...
├── sql/                 # Database files
│   ├── schema.sql       # Database schema
│   └── init.sql         # Initial data
└── storage/             # Storage directory
    └── logs/            # Application logs
```

## Features Documentation

### 1. Theme System
The platform includes three distinct themes:
- **Default Theme**: Clean, professional design with blue color scheme
- **Dark Theme**: Modern dark interface for reduced eye strain
- **Seasonal Theme**: Warm autumn colors with seasonal decorations

Users can switch themes using the theme switcher in the top-right corner.

### 2. Responsive Design
- **Mobile-First**: Designed for mobile devices first, then enhanced for desktop
- **Breakpoints**: 480px, 768px, 1024px, and 1200px
- **Flexible Grid**: CSS Grid and Flexbox for optimal layouts
- **Touch-Friendly**: Large buttons and touch targets for mobile users

### 3. Interactive Features
- **Dynamic Forms**: Real-time validation with JavaScript
- **Search Functionality**: Live search with debounced input
- **Modal Dialogs**: Popup windows for additional information
- **Smooth Scrolling**: Animated scrolling to page sections
- **Lazy Loading**: Images load as they enter the viewport

### 4. Multimedia Elements
- **Videos**: Introduction and walkthrough videos
- **Audio**: Educational podcasts and audio content
- **Interactive Map**: World map showing global reach
- **Images**: High-quality images for services and testimonials

### 5. SEO Features
- **Meta Tags**: Comprehensive meta tags for all pages
- **Open Graph**: Social media sharing optimization
- **Structured Data**: JSON-LD markup for search engines
- **Sitemap**: Dynamic XML sitemap generation
- **Robots.txt**: Search engine crawling instructions

## Admin Panel Features

### User Management
- View all registered users
- Edit user profiles and settings
- Suspend/activate user accounts
- Manage user roles (Student, Tutor, Admin)

### Service Management
- Add/edit tutoring services
- Set pricing and availability
- Upload service images
- Manage service categories

### Order Management
- View all bookings and orders
- Track payment status
- Manage session schedules
- Generate reports

### Content Management
- Edit site settings
- Manage help documentation
- Update static pages
- Monitor system logs

## Help Documentation

The platform includes comprehensive help documentation with:
- **Getting Started Guide**: Step-by-step setup instructions
- **Account Management**: Profile and settings management
- **Booking Guide**: How to book and manage sessions
- **Admin Guide**: Administrative functions and management
- **FAQ Section**: Common questions and answers

## Security Features

- **SQL Injection Prevention**: Prepared statements for all database queries
- **XSS Protection**: Input sanitization and output escaping
- **CSRF Protection**: Cross-site request forgery protection
- **Password Security**: Secure password hashing
- **Session Management**: Secure session handling

## Performance Optimization

- **CSS Optimization**: Minified and optimized stylesheets
- **JavaScript Optimization**: Minified and bundled scripts
- **Image Optimization**: Compressed images with appropriate formats
- **Caching**: Browser caching for static assets
- **Lazy Loading**: Images and content load on demand

## Browser Support

- **Chrome**: 90+
- **Firefox**: 88+
- **Safari**: 14+
- **Edge**: 90+
- **Mobile Browsers**: iOS Safari, Chrome Mobile

## Contributing

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## Support

For support and questions:
- **Email**: support@smartstudy.com
- **Phone**: +1-555-0123
- **Documentation**: `/public/help/`
- **Issues**: GitHub Issues page

## Demo Accounts

### Admin Account
- **Email**: admin@smartstudy.com
- **Password**: admin123

### Student Account
- **Email**: student@example.com
- **Password**: password123

### Tutor Account
- **Email**: tutor@example.com
- **Password**: password123

## Changelog

### Version 1.0.0 (Current)
- Initial release
- Complete tutoring platform
- Admin panel
- Theme system
- Responsive design
- Help documentation

## Acknowledgments

- Font Awesome for icons
- Google Fonts for typography
- Unsplash for stock images
- Contributors and beta testers

---

**SmartStudy Hub** - Empowering education through technology.
