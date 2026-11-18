DROP DATABASE IF EXISTS stackgame_bd;
CREATE DATABASE IF NOT EXISTS stackgame_bd;
USE stackgame_bd;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    login VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    name VARCHAR(50) DEFAULT NULL,
    firstname VARCHAR(50) DEFAULT NULL,
    type_user ENUM('user', 'adminsys', 'adminweb') NOT NULL DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT chk_login CHECK (TRIM(login) <> ''),
    CONSTRAINT chk_name CHECK (TRIM(name) <> ''),
    CONSTRAINT chk_firstname CHECK (TRIM(firstname) <> ''));


INSERT INTO users (login, password, name, firstname, type_user) VALUES
('user@test.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Dupont', 'Jean', 'user'),
('adminweb', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Admin', 'Web', 'adminweb'),
('adminsys', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Admin', 'Sys', 'adminsys');