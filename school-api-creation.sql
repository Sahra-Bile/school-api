
Drop database if exists school_api;

CREATE DATABASE IF NOT EXISTS school_api;
USE school_api;
DROP TABLE IF EXISTS class;
DROP TABLE IF EXISTS students;


-- CLASS TABLE

CREATE TABLE class(
 id INT NOT NULL  AUTO_INCREMENT, 
name varchar(40),
 PRIMARY KEY (id) 
) ENGINE=InnoDB;




-- Students TABLE

CREATE TABLE students(
 id INT NOT NULL  AUTO_INCREMENT,
 classId INT NOT NULL,
first_name VARCHAR(45),
last_name VARCHAR(45),
email VARCHAR(55),
number INT,
 PRIMARY KEY (id),
foreign key(classId) REFERENCES class(id)
) ENGINE=InnoDB;



-- CLASS INSERRT 
INSERT INTO class (name) 
VALUES("WEIS22"), ("WEIFF22"), ("WEISS22"), ("WEISS21");


-- STUDENT INSERT
INSERT INTO students(classId, first_name, last_name, email, number)

VALUES(1, "Sahra", "Bile", "sahra.bile13456£gmail.com" , 0723201976),

( 1, "Nicklas", "Söderlund", "nicklassoderlund96@gmail.com",  0723201943),

( 2 , "Conny", "Segerström", "hatagais@yahoo.se",  0723201912),

(2, "Remy", "Raggarsträng", "raggarremy@live.se",  0723201936),

(3, "Gordon", "Smith", "gsmith@hotmail.com",  0723201976) ,

( 4, "Mia", "Bush", "miabush@blogspot.com", 0723201476) ,

(4, "Tove", "Lissner", "tove.lissner@medieinstitutet.se",  0723401976)





