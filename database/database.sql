-- Crear base de datos
CREATE DATABASE IF NOT EXISTS mi_mvc_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE mi_mvc_db;

-- Crear tabla users
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);


INSERT INTO users (name, email, password, created_at, updated_at)
VALUES (
    'user_test',
    'user_test@example.com',
    '$2y$10$0IErDRhTvLfBmFt/L8aqP.tcGvbZgiiPvCIJrMuz6P8JhuwRcT8Q6',
    NOW(),
    NOW()
);