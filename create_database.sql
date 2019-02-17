CREATE DATABASE IF NOT EXISTS DINH_HERNANDEZ;

use DINH_HERNANDEZ;


CREATE TABLE IF NOT EXISTS user
(
    id INT NOT NULL AUTO_INCREMENT,
    email VARCHAR(150) NOT NULL UNIQUE,
    password VARCHAR(150) NOT NULL,
    api_key VARCHAR(150) NOT NULL UNIQUE,
    PRIMARY KEY (id),
    UNIQUE(email),
    UNIQUE(api_key)
);


CREATE TABLE IF NOT EXISTS urls
(
    id INT NOT NULL AUTO_INCREMENT,
    url VARCHAR(150) NOT NULL UNIQUE,
    last_status INT NOT NULL,
    last_at VARCHAR(150) NOT NULL,
    PRIMARY KEY (id),
    UNIQUE(url)
);

CREATE TABLE IF NOT EXISTS history
(
    id INT NOT NULL,
    status INT NOT NULL,
    at VARCHAR(150) NOT NULL
);

INSERT INTO user 
(
  email, 
  password, 
  api_key
) VALUES (
  'deschaussettes@yopmail.com',
  '$2y$10$It/4IYf//SwAhJRDgSfrcukKk1jCxuaExJ2z.baEol5838rvQQhV.',
  'abcdefghjaimelesapis'
);

INSERT INTO urls
(
  url,
  last_status,
  last_at
) VALUES ('https://www.google.com/', 200, '2019-02-17 22:59:59'),
 ('https://www.twitter.com/', 200, '2019-02-17 22:59:59'),
 ('https://www.ynov.com/', 200, '2019-02-17 22:59:59');