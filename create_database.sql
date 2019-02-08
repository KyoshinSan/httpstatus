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


CREATE TABLE IF NOT EXISTS url
(
    id INT NOT NULL AUTO_INCREMENT,
    url VARCHAR(150) NOT NULL UNIQUE,
    name VARCHAR(150) NOT NULL,
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
  'password',
  'abcdefghjaimelesapis'
);

