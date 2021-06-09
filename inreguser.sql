CREATE DATABASE inreguser;

USE inreguser;

CREATE TABLE users(
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    firstname VARCHAR(100) NOT NULL,
    lastname VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL
);

SELECT * FROM users;












