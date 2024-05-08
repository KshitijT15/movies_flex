CREATE DATABASE IF NOT EXISTS movie_ticket_reservation;

USE movie_ticket_reservation;

CREATE TABLE IF NOT EXISTS movies (
    id INT(6) AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    director VARCHAR(100) NOT NULL,
    release_date DATE NOT NULL,
    rating DECIMAL(3,1) NOT NULL
);
