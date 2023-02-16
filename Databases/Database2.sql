--If
--Binary comparison 'a'/'A'


--Db creation
CREATE DATABASE database2;



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
    FOREIGN KEY (lesson_id) REFERENCES lessons(id) ON DELETE CASCADE);

INSERT INTO undergraduate_students (first_name) VALUE ('stathis');

INSERT INTO lessons (title) value ('lesson1');

INSERT INTO students_lessons (grade, attempt_date, lesson_id, student_id) VALUES (10, '2023-02-14', 1, 1);

ALTER TABLE students_lessons MODIFY attempt_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP;

INSERT INTO students_lessons (grade, lesson_id, student_id) VALUES (10, 2, 1);



--Data input
INSERT INTO undergraduate_students
(email, first_name, last_name, department)
VALUES
('stahism@gmail.com', 'stathis', 'matsaridis', 'IT'),
('nikosp@gmail.com', 'nikos', 'papas', 'Nomiki'),
('nikosg@gmail.com', 'nikos', 'georgiou', 'IT'),
('giorgosk@hotmail.com', 'giorgos', 'kottakis', 'Oikonimiko'),
('dimitrisp@datamail.com', 'dimitris', 'pappas', 'Nomiki'),
('jim_kon@hotmail.com', 'dimitris', 'konstantinou', 'Oikonomiko'),
('dedos_george.com', 'giorgos', 'dedos', 'Nomiki');

--Is email
--First name not in email Homework
SELECT * 
FROM students 
WHERE LOCATE(first_name, email) = 0;

--Last name in email Homework
SELECT * 
FROM students 
WHERE LOCATE(last_name, email) > 0;

--Names that exist more than 1

--Insert with select from another db table
INSERT INTO graduate_students
SELECT * 
FROM undergraduate_students
WHERE id = 2;

DELETE 
FROM undergraduate_students
WHERE id = 2;

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
--Department with most lessons Homework
--Department per lessons Homework


INSERT INTO students_lessons
(student_id, lesson_id, grade)
VALUES
()



                                            --Joins

--Inner join (Επιλογη εγγραφων με κοινες τιμες κελιων στους συγκρινομενους πινακες)

--Επιλογη προπτυχιακων φοιτητων που εχουν βαθμο σε τουλαχιστον 1 μαθημα και τους βαθμους στα μαθηματα αυτα
SELECT S.first_name, S.last_name, SL.grade
FROM undergraduate_students S
    INNER JOIN students_lessons SL
    ON SL.student_id = S.id;

--Επιλογη προπτυχιακων φοιτητων που εχουν βαθμο σε τουλαχιστον 1 μαθημα, τους τιτλους των 
--μαθηματων και τους βαθμους στα μαθηματα αυτα
SELECT US.first_name, US.last_name, L.title, SL.grade
FROM undergraduate_students US

	INNER JOIN students_lessons SL
    ON SL.student_id = US.id
    
    INNER JOIN lessons L
    ON L.id = SL.lesson_id;
    

--Left (Right) join (Επιλογη ολων των εγγραφων του πρωτου πινακα, αυτου στον οποιο αναφερεται το from, 
--και των εγγραφων απο το συγκρινομενο πινακα με ιδιες τιμες κελιων. Οπου δεν υπαρχουν ιδιες τιμες κελιων, επιστρεφεται σαν τιμη το NULL)

--Επιλογη λιστας ολων των προπτυχιακων φοιτητων, τα μαθηματα στα οποια εχουν βαθμο και το βαθμο αυτο, αλλιως NULL
SELECT US.first_name, US.last_name, L.title, SL.grade 
FROM undergraduate_students US 
    LEFT JOIN students_lessons SL 
    ON SL.student_id = US.id 
    
    LEFT JOIN lessons L 
    ON L.id = SL.lesson_id;

--Επιλογη λιστας ολων των προπτυχιακων φοιτητων οι οποιοι δεν εχουν βαθμο σε κανενα μαθημα
SELECT US.first_name, US.last_name, US.id
FROM undergraduate_students US
	LEFT JOIN students_lessons SL
    ON SL.student_id = US.id
    
WHERE SL.id is NULL;

--Union (Ενωση). Επιλογη ολων των στοιχειων 2 πινακων

--Επιλογη του συνολου των προπτυχιακων και αποφοιτησαντων φοιτητων
SELECT * 
FROM graduate_students gs
	UNION
SELECT * 
FROM undergraduate_students US


--Επιλογη του συνολου των προπτυχιακων και αποφοιτησαντων φοιτητων, με αυτοσχεδιο προσδιορισμο
SELECT gs.first_name, gs.last_name, gs.id, 'Graduate' as status
FROM graduate_students gs
	UNION
SELECT US.first_name, US.last_name, US.id, 'Undergraduate' as status
FROM undergraduate_students US


--Max attempt per student
--Max attempt per student/lesson




