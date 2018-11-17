SET GLOBAL VALIDATE_PASSWORD_POLICY = LOW;

GRANT INSERT, SELECT, DELETE, UPDATE ON notice.* TO notice@localhsot IDENTIFIED BY 'isdj_107';

CREATE DATABASE notice;
USE notice;

CREATE TABLE admin (
  `no` INT NOT NULL AUTO_INCREMENT,
  `id` VARCHAR(24) NOT NULL,
  `pw` VARCHAR(64) NOT NULL,
  PRIMARY KEY(no, id)
);

CREATE TABLE board (
  `no` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(100) NOT NULL,
  `subject_id` INT NOT NULL,
  `body` TEXT NULL,
  `category_id` INT NOT NULL,
  `start` DATETIME NULL,
  `deadline` DATETIME NOT NULL,
  `date` DATETIME NOT NULL DEFAULT NOW(),
  PRIMARY KEY(no)
);

CREATE TABLE subject (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` CHAR(24),
  PRIMARY KEY(id)
);

CREATE TABLE category (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` CHAR(24),
  PRIMARY KEY(id)
);

-- SELECT no, title, subject.name AS subject, body, category.name AS category, start, deadline, DATE(date) as date
-- FROM board
-- LEFT JOIN category ON category_id = category.id
-- LEFT JOIN subject ON subject_id = subject.id
-- WHERE deadline >= NOW()
