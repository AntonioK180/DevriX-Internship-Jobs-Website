DROP DATABASE IF EXISTS devrix;
CREATE DATABASE devrix;
USE devrix;


CREATE TABLE joboffers(
  id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  title varchar(150) NOT NULL,
  description varchar(600) DEFAULT NULL,
  company varchar(50) NOT NULL,
  salary int NOT NULL
)


CREATE TABLE admins(
  id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  username varchar(100) NOT NULL,
  password varchar(255) NOT NULL
)
