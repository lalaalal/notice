SET GLOBAL validate_password_policy=LOW;
CREATE USER 'notice'@'localhost' IDENTIFIED BY 'isdj_18_107_notice';
GRANT SELECT, INSERT, DELETE, UPDATE on notice.* to 'notice'@'localhost' IDENTIFIED BY 'isdj_18_107_notice';

CREATE DATABASE notice;
use notice;

CREATE TABLE admin (
  `no` INT NOT NULL AUTO_INCREMENT,
  `id` VARCHAR(24) NOT NULL,
  `pw` VARCHAR(64) NOT NULL,
  PRIMARY KEY(no, id)
);

CREATE TABLE category (
  `no` INT NOT NULL AUTO_INCREMENT,
  `name` CHAR(8) NOT NULL,
  PRIMARY KEY(no)
);

INSERT INTO category (name) VALUES ("숙제");
INSERT INTO category (name) VALUES ("준비물");
INSERT INTO category (name) VALUES ("수행평가");

CREATE TABLE board (
  `no` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(100) NOT NULL,
  `body` TEXT,
  `start` DATETIME NULL,
  `deadline` DATETIME NOT NULL,
  `date` DATETIME NOT NULL DEFAULT NOW(),
  PRIMARY KEY(no)
);

CREATE TABLE class (
  `no` INT NOT NULL AUTO_INCREMENT,
  `grade` INT NOT NULL,
  `room` INT NOT NULL,
  PRIMARY KEY(no)
);
