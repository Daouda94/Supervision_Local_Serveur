CREATE DATABASE IF NOT EXISTS projet_essridi;
CREATE USER IF NOT EXISTS 'essridi'@'%' IDENTIFIED BY 'essridi';

GRANT ALL PRIVILEGES ON projet_essridi.* TO 'essridi'@'%';

CREATE TABLE IF NOT EXISTS Loginz (
    name VARCHAR(30),
    password VARCHAR(40)
);

