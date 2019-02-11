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
    status BOOLEAN NOT NULL DEFAULT 0,
    PRIMARY KEY (id),
    UNIQUE(url)
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
  url
) VALUES ('https://www.google.com/'),
 ('https://www.twitter.com/'),
 ('https://www.ynov.com/'),
 ('http://www.plebweb.fr/');