-- Drop database if it already exists
DROP DATABASE IF EXISTS manageit;

-- Create the database
CREATE DATABASE manageit;

-- Use the database "manageit"
USE manageit;

-- Company Table
CREATE TABLE company (
    company_id INT AUTO_INCREMENT,
    company_name VARCHAR(100) NOT NULL,
    company_pass VARCHAR(50) NOT NULL,
    company_email VARCHAR(100) NOT NULL,
    company_key VARCHAR(50) NOT NULL,
    PRIMARY KEY (company_id)
);

-- Staff Table
CREATE TABLE staff (
    staff_id INT AUTO_INCREMENT,
    staff_name VARCHAR(100) NOT NULL,
    staff_email VARCHAR(100) NOT NULL,
    company_key VARCHAR(50),
    PRIMARY KEY (staff_id),
    FOREIGN KEY (company_key) REFERENCES company(company_key) ON DELETE CASCADE
);

-- Projects Table
CREATE TABLE projects (
    project_id INT AUTO_INCREMENT,
    project_title VARCHAR(100) NOT NULL,
    project_owner VARCHAR(100) NOT NULL,
    project_start DATE NOT NULL,
    project_end DATE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (project_id)
);
