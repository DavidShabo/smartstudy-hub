# SmartStudy Hub

An online tutoring platform built with PHP and MySQL.

## Features

- **20 Dynamic Pages**: Complete website with user management, admin panel, and help documentation
- **Responsive Design**: Works on mobile and desktop devices
- **User Authentication**: Registration, login, and profile management
- **Admin Panel**: User and order management
- **Help Documentation**: 5 comprehensive help pages
- **SEO Optimized**: Meta tags and proper HTML structure

## Pages Structure

### Public Pages (15 pages)
1. `index.php` - Homepage
2. `login.php` - User login
3. `register.php` - User registration
4. `profile.php` - User profile
5. `services.php` - Browse tutoring services
6. `settings.php` - User settings
7. `orders.php` - Order management
8. `order.php` - Individual order view
9. `checkout.php` - Checkout process
10. `book_session.php` - Session booking
11. `questions.php` - Questions listing
12. `question.php` - Individual question
13. `ask.php` - Ask questions
14. `search.php` - Search functionality
15. `rate.php` - Rating system

### Admin Pages (5 pages)
16. `admin/index.php` - Admin dashboard
17. `admin/users.php` - User management
18. `admin/orders.php` - Order management
19. `admin/user_edit.php` - Edit user details
20. `admin/order_view.php` - View order details

## Setup Instructions

1. **Database Setup**:
   ```sql
   CREATE DATABASE smartstudy;
   USE smartstudy;
   ```

2. **Import Database**:
   - Run the SQL commands in `sql/init.sql`

3. **Configuration**:
   - Update database settings in `config/config.php`

4. **Web Server**:
   - Place files in your web server directory
   - Ensure PHP and MySQL are installed

## Demo Accounts

- **Admin**: admin@smartstudy.com / admin123
- **Student**: student@example.com / password123

## File Structure

```
smartstudy-hub/
├── admin/           # Admin panel pages
├── assets/          # CSS, JS, images
├── config/          # Database configuration
├── public/          # Public pages
│   └── help/        # Help documentation
├── sql/             # Database schema
└── README.md        # This file
```

## Technologies Used

- **Backend**: PHP, MySQL
- **Frontend**: HTML5, CSS3, JavaScript
- **Design**: Responsive CSS Grid and Flexbox
- **Features**: Form validation, mobile menu, theme switching

## Requirements Met

✅ 20+ Dynamic Pages  
✅ 5+ Static Pages  
✅ Responsive Design  
✅ User Authentication  
✅ Admin Interface  
✅ Help Documentation (5 pages)  
✅ SEO Meta Tags  
✅ External CSS & JS  
✅ Database with 20+ records  
✅ Form Validation  
✅ Mobile-Friendly Navigation  

## Live Demo

Visit the website to see all features in action!

## Support

For help and documentation, visit `/public/help/` on the website. 