-- 01_create_user_db.sql
CREATE DATABASE IF NOT EXISTS webworkshop
  CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

CREATE USER IF NOT EXISTS 'wp_user'@'%' IDENTIFIED BY 'wp_pass';
GRANT ALL PRIVILEGES ON webworkshop.* TO 'wp_user'@'%';
FLUSH PRIVILEGES;
