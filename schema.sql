DROP DATABASE IF EXISTS doings;

CREATE DATABASE doings CHARACTER SET utf8 COLLATE utf8_general_ci;

USE doings;

CREATE TABLE users (
  id int (10) AUTO_INCREMENT PRIMARY KEY,
  email varchar(50) NOT NULL UNIQUE,
  password char(255) NOT NULL UNIQUE,
  name varchar(50) NOT NULL
);

CREATE TABLE categories (
  id int (10) AUTO_INCREMENT PRIMARY KEY,
  title varchar(50) NOT NULL,
  user_id int (10) NOT NULL
);

CREATE TABLE tasks (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title varchar(50) NOT NULL,
  status BOOLEAN NOT NULL DEFAULT 0,
  file CHAR(64),
  deadline DATE,
  category_id int (10) NOT NULL,
  user_id int (10) NOT NULL
);


