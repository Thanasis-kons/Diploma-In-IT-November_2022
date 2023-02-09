-- Database creation
CREATE DATABASE database1;

-- Create table
CREATE TABLE users_1 (
    id INT(100),
    first_name VARCHAR(254),
    last_name VARCHAR(254),
    email VARCHAR(254),
    phone VARCHAR(20),
    street VARCHAR(50),
    street_number VARCHAR(10),
    username VARCHAR(100),
    user_password VARCHAR(20)
);

CREATE TABLE users_2 (
    id INT NOT NULL AUTO_INCREMENT,
    first_name VARCHAR(254),
    last_name VARCHAR(254),
    email VARCHAR(254),
    phone VARCHAR(20),
    street VARCHAR(50),
    street_number VARCHAR(10),
    username VARCHAR(100),
    user_password VARCHAR(20),
    PRIMARY KEY(id)
);


-- Alter table

DROP TABLE users_1;

ALTER TABLE users_2 RENAME TO users;

ALTER TABLE users ADD COLUMN birthday DATE DEFAULT NULL; --(FIRST/AFTER)
ALTER TABLE users DROP COLUMN birthday;

ALTER TABLE users ADD COLUMN user_status ENUM('active', 'deleted') DEFAULT 'active';


-- Insert Data
INSERT INTO users
(
    first_name, last_name, email, phone, street, street_number, username, user_password
)
VALUES
(
    'Panagiotis', 'Ziogas', 'ziog@gmail.com', '6998784215', 'Ierosolimon', '10', 'Ziogas90', '65989'
);

INSERT INTO users
(first_name, last_name, email, phone, street, street_number, username, user_password)
VALUES
('Stathis', 'Matsaridis', 'mats@gmail.com', '6998786215', 'Kleanthous', '100', 'Matsos', 'AcE11__!'),
('Xenofon', 'Mprazitikos', 'mprazitikos@gmail.com', '6947852145', 'Tsimiski', '101', 'Mprazis', '12!!Abnj');

INSERT INTO users
(first_name, last_name)
VALUES
('Nikos', 'Georgiou'),
('Panagiotis', 'Papadopoulos'),
('Giorgos', 'Gonidis'),
('Giorgos', 'Dionisiou');

INSERT INTO users
(first_name, last_name, email, phone, street, street_number, username, user_password, grade)
VALUES
('Stathis', 'Matsaridis', 'mats@gmail.com', '6998786215', 'Kleanthous', '100', 'Matsos', 'AcE11__!', '8');



-- Get data
SELECT *
FROM users
WHERE CONDITION

SELECT *
FROM database1
WHERE CONDITION

USE database1;
SELECT * FROM `users`;

SELECT * FROM `users` WHERE id > 1;

SELECT first_name, last_name
FROM `users`;

SELECT CONCAT(first_name, ' ', last_name) AS FULLNAME
FROM `users`;

SELECT SUBSTRING(last_name, 1, 5)
FROM `users`;

SELECT CONCAT(first_name, ' ', SUBSTRING(last_name, 1, 1), '.')
FROM `users`;

SELECT DISTINCT first_name
FROM `users`;

SELECT DISTINCT first_name
FROM `users`
LIMIT 2;

SELECT first_name, last_name
FROM `users`
ORDER BY first_name;

SELECT first_name, last_name
FROM `users`
ORDER BY first_name DESC, last_name;

SELECT first_name, last_name
FROM `users`;

SELECT first_name, COUNT(first_name) as counter
FROM `users`
GROUP BY first_name;

SELECT first_name, COUNT(first_name) as counter
FROM `users`
GROUP BY first_name
ORDER BY counter DESC;

SELECT first_name, last_name
FROM users
WHERE last_name LIKE 'M%';

SELECT first_name, last_name, email
FROM users
WHERE email LIKE '%gmail%';

SELECT first_name, last_name, email
FROM users
WHERE email LIKE '%com';

ALTER TABLE users
ADD COLUMN grade INT;

USE database1;
SELECT * from users;


SELECT MAX(grade), MIN(grade), AVG(grade)
FROM users;

SELECT first_name, last_name, grade
FROM users
ORDER BY grade DESC
LIMIT 1;


-- Update data

UPDATE users
SET grade = 5 
WHERE last_name = 'Matsaridis';

UPDATE users
SET grade = ROUND(id/2 + 1, 0) * 2  + id/5;

ALTER TABLE users MODIFY grade DOUBLE;

UPDATE users
SET grade = ROUND(id/2 + 1, 0) * 2  + id/5;

UPDATE users
SET user_status = 'deleted' 
WHERE first_name = 'Stathis';


-- Hard delete data

DELETE
FROM users
WHERE first_name = 'Stathis';