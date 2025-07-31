CREATE DATABASE IF NOT EXISTS smartstudy;
USE smartstudy;

CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  email VARCHAR(100) UNIQUE,
  password VARCHAR(255)
);

CREATE TABLE subjects (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  image VARCHAR(255),
  level ENUM('Beginner', 'Intermediate', 'Advanced')
);

INSERT INTO subjects (name, image, level) VALUES
('Math', 'assets/images/math.png', 'Beginner'),
('Physics', 'assets/images/physics.png', 'Intermediate'),
('Chemistry', 'assets/images/chemistry.png', 'Advanced'),
('Biology', 'assets/images/biology.png', 'Beginner'),
('Computer Science', 'assets/images/coding.png', 'Intermediate'),
('English', 'assets/images/english.png', 'Advanced'),
('History', 'assets/images/history.png', 'Beginner'),
('Geography', 'assets/images/geography.png', 'Intermediate'),
('Economics', 'assets/images/economics.png', 'Advanced'),
('French', 'assets/images/french.png', 'Beginner'),
('Art', 'assets/images/art.png', 'Beginner'),
('Music', 'assets/images/music.png', 'Intermediate'),
('Business', 'assets/images/business.png', 'Advanced'),
('Philosophy', 'assets/images/philosophy.png', 'Intermediate'),
('Psychology', 'assets/images/psychology.png', 'Advanced'),
('Coding - Java', 'assets/images/java.png', 'Intermediate'),
('Coding - Python', 'assets/images/python.png', 'Advanced'),
('SAT Prep', 'assets/images/sat.png', 'Advanced'),
('Essay Help', 'assets/images/essay.png', 'Intermediate'),
('Homework Help', 'assets/images/homework.png', 'Beginner');
