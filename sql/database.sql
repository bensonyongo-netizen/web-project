
-- sql/database.sql
-- Create database and tables for OIT 237 Assignment (Part 5)
CREATE DATABASE IF NOT EXISTS oit237_web CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE oit237_web;

-- Submissions table
CREATE TABLE IF NOT EXISTS submissions (
  id INT AUTO_INCREMENT PRIMARY KEY,
  full_name VARCHAR(120) NOT NULL,
  email VARCHAR(160) NOT NULL,
  phone VARCHAR(40),
  program VARCHAR(80) NOT NULL,
  message TEXT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Users table (for login)
CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) UNIQUE NOT NULL,
  password_hash VARCHAR(255) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Optional: create an admin with a sample hash (will be added by seed_admin.php anyway)
-- INSERT INTO users (username, password_hash) VALUES ('admin', '$2y$10$exampleexampleexampleexampleexampleexampleexampleexample');
