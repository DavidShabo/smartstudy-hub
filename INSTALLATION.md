# SmartStudy Hub - Installation Guide

**Developer: [Your Name] - D.S**  
**Project: SmartStudy Hub - Online Tutoring Platform**  
**Date: 2024**

## 📋 Prerequisites

Before installing SmartStudy Hub, ensure you have:
- **Web Server**: Apache/Nginx with PHP 7.4+ support
- **Database**: MySQL 5.7+ or MariaDB 10.2+
- **PHP Extensions**: mysqli, session, json
- **Minimum Requirements**: 100MB disk space, 512MB RAM

## 🚀 Installation Steps

### Step 1: Download and Extract
```bash
# Download the project files
wget https://github.com/yourusername/smartstudy-hub/archive/main.zip
unzip main.zip
mv smartstudy-hub-main /var/www/html/smartstudy-hub
```

### Step 2: Database Setup
1. **Create Database**:
   ```sql
   CREATE DATABASE smartstudy;
   CREATE USER 'smartstudy_user'@'localhost' IDENTIFIED BY 'your_password';
   GRANT ALL PRIVILEGES ON smartstudy.* TO 'smartstudy_user'@'localhost';
   FLUSH PRIVILEGES;
   ```

2. **Import Schema**:
   ```bash
   mysql -u smartstudy_user -p smartstudy < sql/init.sql
   ```

### Step 3: Configuration
1. **Edit Database Config** (`config/config.php`):
   ```php
   // D.S: Database configuration
   $host = 'localhost';
   $dbname = 'smartstudy';
   $username = 'smartstudy_user';
   $password = 'your_password';
   ```

2. **Set Permissions**:
   ```bash
   chmod 755 /var/www/html/smartstudy-hub
   chmod 644 /var/www/html/smartstudy-hub/config/config.php
   ```

### Step 4: Create Admin User
1. **Run Database Setup**:
   - Visit: `http://yoursite.com/update_database.php`
   - This creates admin user: `admin@smartstudy.com` / `admin123`
   - **Delete** `update_database.php` after use

### Step 5: Test Installation
1. **Visit Homepage**: `http://yoursite.com/public/`
2. **Test Admin Login**: `http://yoursite.com/public/admin_login.php`
3. **Verify Features**: Theme switching, user registration, services

## 🔧 Configuration Options

### Customizing Themes
- **Location**: `assets/css/theme-*.css`
- **Variables**: Edit CSS custom properties in `style.css`
- **Admin Access**: Use admin panel to switch themes

### Adding Content
- **Images**: Place in `assets/images/` (20+ required)
- **Videos**: Place in `assets/media/` (3+ required)
- **Services**: Use admin panel or edit `sql/init.sql`

### SEO Settings
- **Meta Tags**: Edit in each PHP file's `<head>` section
- **Keywords**: Update for each page
- **Descriptions**: Customize for better search ranking

## 🛠️ Troubleshooting

### Common Issues

**1. Database Connection Error**
```php
// D.S: Check database credentials in config/config.php
// Ensure MySQL service is running
```

**2. CSS Not Loading**
```bash
# Check file permissions
chmod 644 assets/css/*.css
# Verify paths are relative, not absolute
```

**3. Admin Login Not Working**
```sql
-- Check if admin user exists
SELECT * FROM users WHERE role = 'admin';
-- Re-run update_database.php if needed
```

**4. Theme Switching Not Working**
```javascript
// D.S: Check localStorage in browser console
// Clear browser cache if needed
```

### Performance Optimization
1. **Enable Caching**: Configure Apache/Nginx caching
2. **Compress Images**: Use WebP format for better loading
3. **Minify CSS/JS**: Use build tools for production

## 📁 File Structure
```
smartstudy-hub/
├── admin/           # Admin panel files
├── assets/          # CSS, JS, images, media
├── config/          # Database and app configuration
├── includes/        # Shared PHP components
├── lib/            # Helper functions
├── public/         # Main website pages
├── sql/            # Database schema
└── storage/        # Logs and uploads
```

## 🔒 Security Considerations

### Production Deployment
1. **Change Default Passwords**:
   - Admin password: `admin123`
   - Database password
   - File permissions

2. **Enable HTTPS**:
   ```apache
   # .htaccess
   RewriteEngine On
   RewriteCond %{HTTPS} off
   RewriteRule ^(.*)$ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]
   ```

3. **Secure Database**:
   - Use strong passwords
   - Limit database user privileges
   - Regular backups

## 📞 Support

**For technical support:**
- **Email**: [your-email@domain.com]
- **Documentation**: Check `help/` folder
- **Issues**: Create GitHub issue

**Developer Notes:**
- **Initials**: D.S
- **Framework**: Custom PHP/MySQL
- **CSS**: Custom with advanced animations
- **JavaScript**: Vanilla JS with localStorage

## 📝 License

This project is developed for educational purposes.
All rights reserved - [Your Name] 2024.

---

**Last Updated**: [Current Date]  
**Version**: 1.0  
**Developer**: [Your Name] - D.S 