CREATE DATABASE yeticave
    DEFAULT CHARACTER SET utf8
    DEFAULT COLLATE utf8_general_ci;

USE yeticave

CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(128) NOT NULL UNIQUE,
    code VARCHAR(128) NOT NULL
);

CREATE TABLE lots (
    id INT AUTO_INCREMENT PRIMARY KEY,
    add_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    description TEXT NOT NULL,
    image_link VARCHAR (256),
    start_price INT NOT NULL,
    expiration_date DATETIME NOT NULL,
    step_summ INT NOT NULL,
    author_id INT NOT NULL,
    winner_id INT NOT NULL,
    category_id INT NOT NULL
);

CREATE TABLE bet (
    id INT AUTO_INCREMENT PRIMARY KEY,
    bet_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    summ_price INT NOT NULL,
    user_id INT NOT NULL,
    lot_id  INT NOT NULL
);

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    email VARCHAR(128) NOT NULL UNIQUE,
    name VARCHAR(128) NOT NULL,
    password VARCHAR(64) NOT NULL,
    contact_inf TEXT NOT NULL
    exposed_lot_id INT,
    exposed_bet_id INT
    );

