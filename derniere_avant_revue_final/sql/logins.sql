CREATE DATABASE IF NOT EXISTS projet_essridi;
CREATE USER IF NOT EXISTS 'dcisse'@'%' IDENTIFIED BY 'Daouda94';

GRANT ALL PRIVILEGES ON projet_essridi.* TO 'dcisse'@'%' IDENTIFIED BY 'Daouda94';
FLUSH PRIVILEGES;

CREATE TABLE IF NOT EXISTS Loginz (
    name VARCHAR(30),
    password VARCHAR(40)
);

CREATE TABLE capteurs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    temperature FLOAT NULL,
    humidite VARCHAR(50) NULL,
    ouverture TINYINT(1) NULL,
    horaire DATETIME DEFAULT CURRENT_TIMESTAMP
);