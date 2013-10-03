CREATE DATABASE sales_one_daryll;
USE DATABASE sales_one_daryll;

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_code VARCHAR(40),
    product_description VARCHAR(40),
    stock_level INT,
    date_created VARCHAR(40),
    quantity INT
);