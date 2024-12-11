DROP DATABASE IF EXISTS manageit;

CREATE DATABASE manageit;

USE manageit;

CREATE TABLE company (
    company_id INT AUTO_INCREMENT,
    company_name VARCHAR(100) NOT NULL,
    company_pass VARCHAR(255) NOT NULL, 
    company_email VARCHAR(100) NOT NULL,
    company_key VARCHAR(50) NOT NULL UNIQUE,
    PRIMARY KEY (company_id)
);

CREATE TABLE staff (
    staff_id INT AUTO_INCREMENT,
    staff_name VARCHAR(100) NOT NULL,
    staff_email VARCHAR(100) NOT NULL,
    staff_key VARCHAR(50) NOT NULL,
    PRIMARY KEY (staff_id)
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

-- tasks Table
CREATE TABLE tasks (
    tasks_id INT AUTO_INCREMENT,
    tasks_name VARCHAR(100) NOT NULL,
    tasks_start DATE NOT NULL,
    tasks_end DATE NOT NULL,
    PRIMARY KEY (tasks_id)
);