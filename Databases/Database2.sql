--If
--Binary comparison 'a'/'A'


--Db creation
CREATE DATABASE database1;



--Table creation
CREATE TABLE undergraduate_students (
    id INT NOT NULL AUTO_INCREMENT,
    first_name VARCHAR(254),
    last_name VARCHAR(254),
    email VARCHAR(254),
    phone VARCHAR(20),
    street VARCHAR(50),
    street_number VARCHAR(10),
    username VARCHAR(100),
    user_password VARCHAR(20),
    department VARCHAR(20),
    UNIQUE (email),
    PRIMARY KEY(id)
);


CREATE TABLE graduate_students (
    id INT NOT NULL,
    first_name VARCHAR(254),
    last_name VARCHAR(254),
    email VARCHAR(254),
    phone VARCHAR(20),
    street VARCHAR(50),
    street_number VARCHAR(10),
    username VARCHAR(100),
    user_password VARCHAR(20),
    department VARCHAR(20),
    UNIQUE (email),
    PRIMARY KEY(id)
);

CREATE TABLE dropout_students (
    id INT NOT NULL,
    first_name VARCHAR(254),
    last_name VARCHAR(254),
    email VARCHAR(254),
    phone VARCHAR(20),
    street VARCHAR(50),
    street_number VARCHAR(10),
    username VARCHAR(100),
    user_password VARCHAR(20),
    department VARCHAR(20),
    UNIQUE (email),
    PRIMARY KEY(id)
);


CREATE TABLE lessons (
    id INT NOT NULL AUTO_INCREMENT,
    title VARCHAR(254),
    department VARCHAR(20),
    semester INT,
    points VARCHAR(254),
    PRIMARY KEY(id)
);

CREATE TABLE students_lessons (
    id INT NOT NULL AUTO_INCREMENT,
    student_id INT NOT NULL,
    lesson_id INT NOT NULL,
    last_attempt DATE,
    grade INT,
    PRIMARY KEY(id),
    FOREIGN KEY (lesson_id) REFERENCES lessons(id)
);

DROP TABLE students_lessons;

CREATE TABLE students_lessons (
    id INT NOT NULL AUTO_INCREMENT,
    student_id INT NOT NULL,
    lesson_id INT NOT NULL,
    attempt_date DATE,
    grade INT,
    PRIMARY KEY(id),
    FOREIGN KEY (student_id) REFERENCES students(id) ON DELETE CASCADE);

INSERT INTO students (first_name) VALUE ('stathis')

INSERT INTO lessons (title) value ('lesson1')

INSERT INTO students_lessons (grade, last_attempt, lesson_id, student_id) VALUES (10, '2023-02-14', 1, 1);

ALTER TABLE students_lessons MODIFY last_attempt TIMESTAMP DEFAULT CURRENT_TIMESTAMP;

INSERT INTO students_lessons (grade, lesson_id, student_id) VALUES (10, 1, 1);



--Data input
INSERT INTO undergraduate_students
(email, first_name, last_name, department)
VALUES
('stahism@gmail.com', 'stathis', 'matsaridis', 'IT'),
('nikosp@gmail.com', 'nikos', 'papas', 'Nomiki'),
('nikosg@gmail.com', 'nikos', 'georgiou', 'IT'),
('giorgosk@hotmail.com', 'giorgos', 'kottakis', 'Oikonimiko'),
('dimitrisp@datamail.com', 'dimitris', 'pappas', 'Nomiki'),
('jim_kon@hotmail.com', 'dimitris', 'konstantinou' 'Oikonomiko'),
('dedos_george.com', 'giorgos', 'dedos', 'Nomiki');

--Is email
--First name not in email
--Last name in email
--Names that exist more than 1

INSERT INTO graduate_students
SELECT * 
FROM undergraduate_students
WHERE id = 1;

DELETE 
FROM undergraduate_students
WHERE id = 1;

INSERT INTO lessons
(title, department, points, semester)
VALUES
('Vaseis Dedomenon 1', 'IT', 5, 1),
('Java', 'IT', 5, 2),
('PHP', 'IT', 7, 2),
('Statistiki 1', 'IT', 5, 2),
('Astiko Dikaio 1', 'Nomiki', 7, 2),
('Poinikos dikaio 1', 'Nomiki', 6, 2),
('Statistiki 1', 'Nomiki', 5, 2),
('Poiniko dikaio 2', 'Nomiki', 8, 4),
('Logistiki 2', 'Oikonomiko', 4, 3);

--Lessons per department
--Department with most lessons
--Department per lessons


INSERT INTO students_lessons
(student_id, lesson_id, grade)
VALUES
()



--Joins

SELECT S.first_name, S.last_name, SL.grade
FROM students S
    INNER JOIN students_lessons SL
    ON SL.student_id = S.id;


--Max attempt per student
--Max attempt per student/lesson




