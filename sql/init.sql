CREATE DATABASE IF NOT EXISTS smartstudy;
USE smartstudy;

-- Users table
CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  email VARCHAR(100) UNIQUE,
  password VARCHAR(255),
  role ENUM('student', 'tutor', 'admin') DEFAULT 'student'
);

-- Subjects table with price and description added
CREATE TABLE subjects (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  image VARCHAR(255),
  level ENUM('Beginner', 'Intermediate', 'Advanced'),
  description TEXT,
  price DECIMAL(10,2)
);

-- Insert 20 subjects with description and price
INSERT INTO subjects (name, image, level, description, price) VALUES
('Math', 'assets/images/math.png', 'Beginner', 'Master arithmetic, algebra, and more.', 25.00),
('Physics', 'assets/images/physics.png', 'Intermediate', 'Understand motion, energy, and matter.', 30.00),
('Chemistry', 'assets/images/chemistry.png', 'Advanced', 'Explore reactions, compounds, and equations.', 35.00),
('Biology', 'assets/images/biology.png', 'Beginner', 'Study living organisms and ecosystems.', 25.00),
('Computer Science', 'assets/images/coding.png', 'Intermediate', 'Learn programming, algorithms, and data.', 40.00),
('English', 'assets/images/english.png', 'Advanced', 'Improve writing, reading, and analysis skills.', 30.00),
('History', 'assets/images/history.png', 'Beginner', 'Discover historical events and civilizations.', 20.00),
('Geography', 'assets/images/geography.png', 'Intermediate', 'Understand Earth, regions, and mapping.', 22.50),
('Economics', 'assets/images/economics.png', 'Advanced', 'Analyze markets, supply/demand, and policies.', 35.00),
('French', 'assets/images/french.png', 'Beginner', 'Learn basic conversational French.', 20.00),
('Art', 'assets/images/art.png', 'Beginner', 'Explore drawing, painting, and creativity.', 18.00),
('Music', 'assets/images/music.png', 'Intermediate', 'Understand theory and practice instruments.', 28.00),
('Business', 'assets/images/business.png', 'Advanced', 'Learn finance, management, and marketing.', 40.00),
('Philosophy', 'assets/images/philosophy.png', 'Intermediate', 'Explore ethics, logic, and great thinkers.', 26.00),
('Psychology', 'assets/images/psychology.png', 'Advanced', 'Study behavior, cognition, and emotion.', 32.00),
('Coding - Java', 'assets/images/java.png', 'Intermediate', 'Write object-oriented applications with Java.', 33.00),
('Coding - Python', 'assets/images/python.png', 'Advanced', 'Build scripts, apps, and AI with Python.', 35.00),
('SAT Prep', 'assets/images/sat.png', 'Advanced', 'Ace the SAT with strategy and practice.', 50.00),
('Essay Help', 'assets/images/essay.png', 'Intermediate', 'Improve your essay structure and clarity.', 24.00),
('Homework Help', 'assets/images/homework.png', 'Beginner', 'General help with assignments and topics.', 15.00);
