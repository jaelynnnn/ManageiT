-- drop the datbase incase it aready exists
DROP DATABASE IF EXISTS manageit;

-- create database
CREATE DATABASE manageit;

-- use the database "manaeit"
USE manageit;

-- create the table for company register
CREATE TABLE company(
	company_id INT AUTO_INCREMENT,
-- auto increment means it will automatically create the id number
    company_name VARCHAR(100) NOT NULL,
    company_pass VARCHAR(50) NOT NULL,
    company_email VARCHAR(100) NOT NULL,
    company_key VARCHAR(50) NOT NULL,
    PRIMARY KEY (company_id)
    );
    
-- create table for employee details
 -- using word staff instead of employee cus its shorter :)
CREATE TABLE staff (
	staff_id INT AUTO_INCREMENT,
    staff_name VARCHAR(100) NOT NULL,
    staff_email VARCHAR(100) NOT NULL,
    PRIMARY KEY (staff_id),
    FOREIGN KEY (staff_key) REFERENCES company(company_key)
-- foreign key because the "staff key" = the "company key ", company key is from the company table`
    );
    
-- create table for project
CREATE TABLE projects (
    project_id INT AUTO_INCREMENT PRIMARY KEY,
    project_title VARCHAR(100) NOT NULL,
    project_owner VARCHAR(100) NOT NULL,
    project_start DATE NOT NULL,
    project_end DATE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
