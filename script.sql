CREATE DATABASE cw_s_8_db;

USE cw_s_8_db;

CREATE TABLE teachers (
    teacher_id INT PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(50),
    last_name VARCHAR(50),
    email   VARCHAR(50)  NULL,
    photo   VARCHAR(255) NOT NULL,
    department VARCHAR(50) DEFAULT 'CS'

);

CREATE TABLE users (
    userId INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50),
    email   VARCHAR(50),
    password VARCHAR (64) NOT NULL
)