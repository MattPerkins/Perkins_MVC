CREATE DATABASE IF NOT EXISTS sdc310_midterm;
USE sdc310_midterm;

CREATE TABLE IF NOT EXISTS addresses (
    AddressNo INT AUTO_INCREMENT PRIMARY KEY,
    First VARCHAR(25) NOT NULL,
    Last VARCHAR(30) NOT NULL,
    Street VARCHAR(100) NOT NULL,
    City VARCHAR(25) NOT NULL,
    State CHAR(2) NOT NULL,
    Zip VARCHAR(10) NOT NULL
);

INSERT INTO addresses (First, Last, Street, City, State, Zip) VALUES
('Matthew', 'Perkins', '123 College Street', 'Virginia Beach', 'VA', '23452'),
('Jane', 'Doe', '456 Sample Avenue', 'Norfolk', 'VA', '23510');

CREATE USER IF NOT EXISTS 'ecpi_user'@'localhost' IDENTIFIED BY 'ecpi';
GRANT ALL PRIVILEGES ON sdc310_midterm.* TO 'ecpi_user'@'localhost';
FLUSH PRIVILEGES;
