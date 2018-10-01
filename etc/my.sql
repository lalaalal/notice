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
  `name` CHAR(8),
  PRIMARY KEY(id)
);

CREATE TABLE category (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` CHAR(8),
  PRIMARY KEY(id)
);
