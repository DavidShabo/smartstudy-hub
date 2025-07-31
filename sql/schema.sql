-- SmartStudy Hub Database Schema
-- Comprehensive tutoring platform database

-- Users table for authentication and profiles
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    phone VARCHAR(20),
    role ENUM('student', 'tutor', 'admin') DEFAULT 'student',
    status ENUM('active', 'inactive', 'suspended') DEFAULT 'active',
    profile_image VARCHAR(255),
    bio TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Services/Subjects table for tutoring services
CREATE TABLE services (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    price DECIMAL(10,2) NOT NULL,
    duration INT DEFAULT 60, -- minutes
    category VARCHAR(100),
    image VARCHAR(255),
    status ENUM('active', 'inactive') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Orders table for booking sessions
CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    service_id INT NOT NULL,
    tutor_id INT,
    session_date DATE NOT NULL,
    session_time TIME NOT NULL,
    duration INT DEFAULT 60,
    total_amount DECIMAL(10,2) NOT NULL,
    status ENUM('pending', 'confirmed', 'completed', 'cancelled') DEFAULT 'pending',
    payment_status ENUM('pending', 'paid', 'refunded') DEFAULT 'pending',
    notes TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (service_id) REFERENCES services(id),
    FOREIGN KEY (tutor_id) REFERENCES users(id)
);

-- Questions table for Q&A feature
CREATE TABLE questions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    subject VARCHAR(100),
    attachments TEXT, -- JSON array of file paths
    status ENUM('open', 'answered', 'closed') DEFAULT 'open',
    views INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Answers table for Q&A responses
CREATE TABLE answers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    question_id INT NOT NULL,
    user_id INT NOT NULL,
    content TEXT NOT NULL,
    is_accepted BOOLEAN DEFAULT FALSE,
    rating INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (question_id) REFERENCES questions(id),
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Ratings table for service reviews
CREATE TABLE ratings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT NOT NULL,
    user_id INT NOT NULL,
    service_id INT NOT NULL,
    rating INT NOT NULL CHECK (rating >= 1 AND rating <= 5),
    review TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (order_id) REFERENCES orders(id),
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (service_id) REFERENCES services(id)
);

-- Site settings table for admin configuration
CREATE TABLE site_settings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    setting_key VARCHAR(100) UNIQUE NOT NULL,
    setting_value TEXT,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Insert default admin user
INSERT INTO users (email, password, first_name, last_name, role) 
VALUES ('admin@smartstudy.com', MD5('admin123'), 'Admin', 'User', 'admin');

-- Insert sample services/subjects
INSERT INTO services (name, description, price, category) VALUES
('Mathematics Tutoring', 'Comprehensive math tutoring covering algebra, calculus, and statistics', 50.00, 'Mathematics'),
('Physics Tutoring', 'Physics concepts from mechanics to quantum physics', 55.00, 'Science'),
('Chemistry Tutoring', 'General and organic chemistry tutoring', 50.00, 'Science'),
('Biology Tutoring', 'Biology concepts and laboratory techniques', 45.00, 'Science'),
('English Literature', 'Literature analysis and essay writing', 40.00, 'Language Arts'),
('History Tutoring', 'World history and historical analysis', 40.00, 'Social Studies'),
('Computer Science', 'Programming, algorithms, and software development', 60.00, 'Technology'),
('Economics Tutoring', 'Micro and macroeconomics concepts', 45.00, 'Social Studies'),
('Psychology Tutoring', 'Introduction to psychology and research methods', 45.00, 'Social Studies'),
('Spanish Language', 'Spanish conversation and grammar', 35.00, 'Language Arts'),
('French Language', 'French conversation and grammar', 35.00, 'Language Arts'),
('German Language', 'German conversation and grammar', 35.00, 'Language Arts'),
('Statistics Tutoring', 'Statistical analysis and data interpretation', 50.00, 'Mathematics'),
('Calculus Tutoring', 'Differential and integral calculus', 55.00, 'Mathematics'),
('Linear Algebra', 'Matrix operations and vector spaces', 50.00, 'Mathematics'),
('Organic Chemistry', 'Advanced organic chemistry concepts', 60.00, 'Science'),
('Biochemistry', 'Molecular biology and biochemistry', 55.00, 'Science'),
('Creative Writing', 'Fiction and non-fiction writing skills', 40.00, 'Language Arts'),
('Public Speaking', 'Presentation skills and speech writing', 45.00, 'Communication'),
('Research Methods', 'Academic research and methodology', 50.00, 'Academic Skills');

-- Insert default site settings
INSERT INTO site_settings (setting_key, setting_value) VALUES
('site_name', 'SmartStudy Hub'),
('site_description', 'Professional online tutoring platform'),
('site_theme', 'default'),
('contact_email', 'contact@smartstudy.com'),
('contact_phone', '+1-555-0123');
