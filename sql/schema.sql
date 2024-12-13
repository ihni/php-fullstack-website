-- Roles are based on binary:
-- 0 for users, 1 for admins

CREATE TABLE IF NOT EXISTS users (
    role TINYINT(1) UNSIGNED NOT NULL DEFAULT 0,
    id INT AUTO_INCREMENT PRIMARY KEY,
    fname VARCHAR(50) NOT NULL,
    lname VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);