CREATE DATABASE IF NOT EXISTS yt;
USE yt;

CREATE TABLE IF NOT EXISTS videos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    video_id VARCHAR(255) NOT NULL,
    comment TEXT
);
