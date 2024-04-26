-- 'todo'

-- DROP DATABASE IF EXISTS todo;
--
CREATE DATABASE IF NOT EXISTS todo;

USE todo;

DROP TABLE IF EXISTS user;
DROP TABLE IF EXISTS todolist;

CREATE TABLE user (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
) ENGINE=InnoDB;

CREATE TABLE todolist (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    task VARCHAR(255) NOT NULL,
    user_id INT UNSIGNED NOT NULL
)ENGINE=InnoDB;

INSERT INTO user
(id, username, password)
VALUES
    (1, 'HarryPotter', '1234'),
    (2, 'HermioneGranger', '1234'),
    (3, 'RonWeasley', '1234'),
    (4, 'AlbusDumbledore', '1234');

INSERT INTO todolist
(id, task, user_id)
VALUES
    (1, 'Sweets', 1),
    (2, 'Books', 2),
    (3, 'Movies', 3),
    (4, 'Strawberries', 3),
    (5, 'Books', 2),
    (6, 'Wand', 4);
